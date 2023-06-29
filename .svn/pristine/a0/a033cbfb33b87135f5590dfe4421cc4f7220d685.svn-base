<?php

namespace App\Http\Controllers\Frontend\Shop;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\MainCategory;
use App\Models\Products;
use Illuminate\Http\Request;

class FilterwiseProductController extends Controller
{
    public function categoryWiseProducts($id)
    {

        $brands = Brand::where('is_active', 1)->get();
        $maincategorys = MainCategory::where('is_active', 1)->get();
        $products = Products::select('products.*', 'main_categories.main_category_name')
            ->join('main_categories', 'main_categories.id', 'products.main_category_id')
            ->where('products.is_active', 1)
            ->where('products.main_category_id', $id)
            ->get();

        return view('frontend.shop.shop', compact('brands', 'maincategorys', 'products'));
    }

    public function brandWiseProducts(Request $request)
    {

        if ($request->brand != 0) {
            // $arrayData = explode(',', $request->brand);
            $brandwiseproducts = [];

            foreach ($request->brand as $id) {
                $brandProducts = Products::select('products.*', 'main_categories.main_category_name')
                    ->join('main_categories', 'main_categories.id', 'products.main_category_id')
                    ->where('products.is_active', 1)
                    ->where('products.brand_id', $id)
                    ->orWhereBetween('product_price', [$request->min_price, $request->max_price])
                    ->get()
                    ->toArray();

                $brandwiseproducts = array_merge($brandwiseproducts, $brandProducts);
            }
            return response()->json([
                'brandwiseproducts' => $brandwiseproducts
            ]);

        }elseif($request->max_price != null && $request->min_price != null){
            $brandwiseproducts = [];

            $brandProducts = Products::select('products.*', 'main_categories.main_category_name')
                    ->join('main_categories', 'main_categories.id', 'products.main_category_id')
                    ->where('products.is_active', 1)
                    ->whereBetween('product_price', [$request->min_price, $request->max_price])
                    ->get()
                    ->toArray();
                    $brandwiseproducts = array_merge($brandwiseproducts, $brandProducts);

                    return response()->json([
                        'brandwiseproducts' => $brandwiseproducts
                    ]);

        }else {
            $brandwiseproducts = Products::select('products.*', 'main_categories.main_category_name')
                ->join('main_categories', 'main_categories.id', 'products.main_category_id')
                ->where('products.is_active', 1)
                ->get();

                return response()->json([
                    'brandwiseproducts' => $brandwiseproducts
                ]);
        }
    }
}
