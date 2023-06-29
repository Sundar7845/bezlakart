<?php

namespace App\Http\Controllers\Frontend\Quickview;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class QuickViewController extends Controller
{
    public function quickViewdata($id)
    {

        $product_details = Products::select('products.*', 'product_multiple_images.product_image', 
        'main_categories.main_category_name', 'brands.brand_image')
            ->join('product_multiple_images', 'product_multiple_images.product_id', 'products.id')
            ->join('main_categories', 'main_categories.id', 'products.main_category_id')
            ->join('brands', 'brands.id', 'products.brand_id')
            ->where('products.id', $id)
            ->get();
        return response()->json([
            'productdetails' => $product_details
        ]);
    }
}
