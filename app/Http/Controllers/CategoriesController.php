<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('is_active', 1)->get();
        return view('pages.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        try {

            $isActiveValue = isset($request->is_active) ? 1 : 0;
            $request->merge(['is_active' => $isActiveValue]);

            if ($request->hasFile('category_cover_image')) {

                // Get filename with extension
                $fileNameWithExtension = $request->file('category_cover_image')->getClientOriginalName();

                // Get Jus File Name
                $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);

                // Get Extension
                $extension = $request->file('category_cover_image')->getClientOriginalExtension();

                // File name to Store
                if (str_contains($request->name, '/')) {

                    $charcrs = array('/', ':');

                    $fileNameModified = str_replace($charcrs, '-', $request->name);
                    $fileNameToStore = time() . '-category-cover-' . $fileNameModified .'.'.$extension;

                }else {

                    $fileNameToStore = time() . '-category-cover-' . $request->name .'.'.$extension;

                }

                Log::debug("Image Name to Store : ".$fileNameToStore);

                // Upload Image
                $path = $request->file('category_cover_image')->storeAs('public/category', $fileNameToStore);

                $request->merge(['image' => $fileNameToStore]);
            }

            Category::create($request->all());

            return redirect('/categories')->with('success', __('Category Created Successfully!'));

        } catch (\Throwable $th) {

            //throw $th;
            return redirect('/categories')->with('error', __('Something went wrong!'));

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
        $category = Category::findorFail($id);
        return view('pages.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        try {

            $isActiveValue = isset($request->is_active) ? 1 : 0;
            $request->merge(['is_active' => $isActiveValue]);

            if ($request->hasFile('category_cover_image')) {

                // Get filename with extension
                $fileNameWithExtension = $request->file('category_cover_image')->getClientOriginalName();

                // Get Jus File Name
                $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);

                // Get Extension
                $extension = $request->file('category_cover_image')->getClientOriginalExtension();

                // File name to Store
                if (str_contains($request->name, '/')) {

                    $charcrs = array('/', ':');

                    $fileNameModified = str_replace($charcrs, '-', $request->name);
                    $fileNameToStore = time() . '-category-cover-' . $fileNameModified .'.'.$extension;

                }else {

                    $fileNameToStore = time() . '-category-cover-' . $request->name .'.'.$extension;

                }

                Log::debug("Image Name to Store : ".$fileNameToStore);

                // Upload Image
                $path = $request->file('category_cover_image')->storeAs('public/category', $fileNameToStore);

                $request->merge(['image' => $fileNameToStore]);
            }

            $category = Category::findorFail($id);

            $category->update($request->all());

            return redirect('/categories')->with('success', __('Category Updated Successfully!'));

        } catch (\Throwable $th) {

            //throw $th;
            return redirect('/categories')->with('error', __('Something went wrong!'));

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
