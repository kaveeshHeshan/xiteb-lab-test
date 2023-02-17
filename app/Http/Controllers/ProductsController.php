<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\ProductImages;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productImagesArray = [];
        $subcategories = Subcategory::where('is_active', 1)->get();
        return view('pages.products.create', compact('productImagesArray', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        try {
            
            DB::beginTransaction();

            // Add new product details
            $product = Product::create($request->all());

            if ($request->has('product_images')) {
                
                $i = 1;

                foreach ($request->product_images as $productImage) {

                    // Get filename with extension
                    $fileNameWithExtension = $productImage->getClientOriginalName();

                    // Get Jus File Name
                    $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);

                    // Get Extension
                    $extension = $productImage->getClientOriginalExtension();

                    // File name to Store
                    if (str_contains($request->name, '/') || str_contains($request->name, ':')) {

                        $charcrs = array('/', ':');

                        $fileNameModified = str_replace($charcrs, '-', $request->name);
                        $fileNameToStore = time(). $product->id . '-product-'. $i.'-'.'.'.$extension;

                    }else {

                        $fileNameToStore = time(). $product->id . '-product-'. $i.'-'.'.'.$extension;

                    }

                    // Upload Image
                    $path = $productImage->storeAs('public/products', $fileNameToStore);

                    DB::beginTransaction();

                    ProductImages::create([
                        'product_id' => $product->id,
                        'image' => $fileNameToStore,
                    ]);

                    DB::commit();

                    $i++;
                }

                DB::commit();

                return redirect('/products')->with('success', __('Product Created Successfully!'));

            }

        } catch (\Throwable $th) {

            //throw $th;
            DB::rollback();
            Log::debug("Error - Products Store : ".$th->getMessage());
            return redirect('/products')->with('error', __('Something went wrong!'));

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findorFail($id);
        if (!is_null($product)) {
            foreach ($product->otherProductImages as $productImageDetail) {
                $productImagesArray[] = ['id' => $productImageDetail->id, 'value' => asset('/storage/products/'.$productImageDetail->image)];
            }
        }else {
            $productImagesArray = [];
        }

        $subcategories = Subcategory::where('is_active', 1)->get();
        return view('pages.products.edit', compact('product', 'productImagesArray', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            // Update product details
            $product = Product::findorFail($id);
            $product->update($request->all());

            if ($request->has('product_images')) {

                // Image removal process - remove images removed in the product edit view
                if ($request->has('available_images')) {
                    $oldImagesIdArr = $product->otherProductImages->pluck('id')->toArray();
                    $currentImagesIdsArr = $request->available_images;
    
                    $diffImagesArr = array_values(array_diff($oldImagesIdArr, $currentImagesIdsArr));
                    
                    if (count($diffImagesArr) > 0) {
                        
                        ProductImages::whereIn('id', $diffImagesArr)->delete();
    
                    }
                }

                $i = 1;

                // Image Upload Process

                foreach ($request->product_images as $productImage) {

                    // Get filename with extension
                    $fileNameWithExtension = $productImage->getClientOriginalName();

                    // Get Jus File Name
                    $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);

                    // Get Extension
                    $extension = $productImage->getClientOriginalExtension();

                    // File name to Store
                    if (str_contains($request->name, '/') || str_contains($request->name, ':')) {

                        $charcrs = array('/', ':');

                        $fileNameModified = str_replace($charcrs, '-', $request->name);
                        $fileNameToStore = time(). $product->id . '-product-'. $i.'-'.'.'.$extension;

                    }else {

                        $fileNameToStore = time(). $product->id . '-product-'. $i.'-'.'.'.$extension;

                    }

                    // Upload Image
                    $path = $productImage->storeAs('public/products', $fileNameToStore);

                    DB::beginTransaction();

                    ProductImages::create([
                        'product_id' => $product->id,
                        'image' => $fileNameToStore,
                    ]);

                    DB::commit();

                    $i++;
                }

                DB::commit();

                return redirect('/products')->with('success', __('Product Updated Successfully!'));

            }

        } catch (\Throwable $th) {

            //throw $th;
            DB::rollback();
            Log::debug("Error - Products Update : ".$th->getMessage());
            return redirect('/products')->with('error', __('Something went wrong!'));

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteProduct(Request $request)
    {
        try {
            
            $post = Product::findorFail($request->id);

            if (!is_null($post)) {
                
                $post->delete();

                return response()->json([
                    'status' => 'success',
                    'message' => 'Product removed successfully!',
                ])->setStatusCode(200);
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => 'No Post found!',
                ])->setStatusCode(562);
            }

        } catch (\Throwable $th) {
            //throw $th;
            Log::debug("Post - Delete : ".$th->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong!',
            ])->setStatusCode(561);
        }
    }
}
