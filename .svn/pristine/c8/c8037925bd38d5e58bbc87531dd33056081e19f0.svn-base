<?php

namespace App\Http\Controllers\Frontend\Product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\MainCategory;
use App\Models\Products;
use App\Traits\Common;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    use Common;
    function autosearch(Request $request)
    {
        $products = Products::select('products.*', 'main_categories.main_category_name')
            ->join('main_categories', 'main_categories.id', 'products.main_category_id')
            ->where('product_name', 'like', '%' . $request->search . '%')
            ->where('products.is_active', 1)
            ->get();
        $brands = Brand::where('is_active', 1)->get();
        $maincategorys = MainCategory::where('is_active', 1)->get();
        return view('frontend.shop.shop', compact('products', 'brands', 'maincategorys'));
    }
}
