<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class PagesControiller extends Controller
{

    public function welcomePage()
    {
        $categories = Category::where('is_active', 1)->get();

        return view('pages.user.welcome', compact('categories'));
    }

    public function subcategoriesByCategoryId($category_id)
    {
        $subcategories = Subcategory::where('category_id', $category_id)->where('is_active', 1)->get();
        return view('pages.user.subcategories_list', compact('subcategories', 'category_id'));
    }

    public function productsBySubcategoryId($category_id, $subcategory_id)
    {
        $products = Product::where('subcategory_id', $subcategory_id)->get();
        return view('pages.user.products_list', compact('products', 'category_id', 'subcategory_id'));
    }

    public function productDetailsById($product_id)
    {
        $product = Product::findorFail($product_id);
        return view('pages.user.product_view', compact('product'));
    }
}
