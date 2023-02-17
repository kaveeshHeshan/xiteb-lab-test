<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreSubcategoryRequest;
use App\Http\Requests\UpdateSubcategoryRequest;

class SubcategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        return view('pages.subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('is_active', 1)->get();
        return view('pages.subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubcategoryRequest $request)
    {
        try {

            $isActiveValue = isset($request->is_active) ? 1 : 0;
            $request->merge(['is_active' => $isActiveValue]);

            if ($request->hasFile('subcategory_cover_image')) {

                // Get filename with extension
                $fileNameWithExtension = $request->file('subcategory_cover_image')->getClientOriginalName();

                // Get Jus File Name
                $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);

                // Get Extension
                $extension = $request->file('subcategory_cover_image')->getClientOriginalExtension();

                // File name to Store
                if (str_contains($request->name, '/')) {

                    $charcrs = array('/', ':');

                    $fileNameModified = str_replace($charcrs, '-', $request->name);
                    $fileNameToStore = time() . '-subcategory-cover-' . $fileNameModified .'.'.$extension;

                }else {

                    $fileNameToStore = time() . '-subcategory-cover-' . $request->name .'.'.$extension;

                }

                Log::debug("Image Name to Store : ".$fileNameToStore);

                // Upload Image
                $path = $request->file('subcategory_cover_image')->storeAs('public/subcategory', $fileNameToStore);

                $request->merge(['image' => $fileNameToStore]);
            }

            Subcategory::create($request->all());

            return redirect('/subcategories')->with('success', __('Subcategory Created Successfully!'));

        } catch (\Throwable $th) {

            //throw $th;
            return redirect('/subcategories')->with('error', __('Something went wrong!'));

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
        $subcategory = Subcategory::findorFail($id);
        $categories = Category::where('is_active', 1)->get();
        return view('pages.subcategories.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubcategoryRequest $request, $id)
    {
        try {

            $isActiveValue = isset($request->is_active) ? 1 : 0;
            $request->merge(['is_active' => $isActiveValue]);

            if ($request->hasFile('subcategory_cover_image')) {

                // Get filename with extension
                $fileNameWithExtension = $request->file('subcategory_cover_image')->getClientOriginalName();

                // Get Jus File Name
                $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);

                // Get Extension
                $extension = $request->file('subcategory_cover_image')->getClientOriginalExtension();

                // File name to Store
                if (str_contains($request->name, '/')) {

                    $charcrs = array('/', ':');

                    $fileNameModified = str_replace($charcrs, '-', $request->name);
                    $fileNameToStore = time() . '-subcategory-cover-' . $fileNameModified .'.'.$extension;

                }else {

                    $fileNameToStore = time() . '-subcategory-cover-' . $request->name .'.'.$extension;

                }

                Log::debug("Image Name to Store : ".$fileNameToStore);

                // Upload Image
                $path = $request->file('subcategory_cover_image')->storeAs('public/subcategory', $fileNameToStore);

                $request->merge(['image' => $fileNameToStore]);
            }

            $subcategory = Subcategory::findorFail($id);
            $subcategory->update($request->all());

            return redirect('/subcategories')->with('success', __('Subcategory Updated Successfully!'));

        } catch (\Throwable $th) {

            //throw $th;
            return redirect('/subcategories')->with('error', __('Something went wrong!'));

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
}
