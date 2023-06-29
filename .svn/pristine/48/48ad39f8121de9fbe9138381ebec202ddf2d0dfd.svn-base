<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\Common;
use App\Traits\ResponseAPI;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    use Common;
    use ResponseAPI;

    function products(Request $request)
    {
        try {
            $products = $this->getProducts($request->user_id)->get();
            $responseData = $this->getProductList($products, $request->user_id);
            return response()->json(['data' => $responseData], 200);
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, request()->method(), $e->getMessage(), 0, request()->ip(), gethostname(), 1);
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    function productDetail(Request $request, $product_id)
    {
        try {

            $products = $this->getProductDetail($product_id, $request->user_id);
            $data = [
                'product_id' => $products->id,
                'main_category_id' => $products->main_category_id,
                'main_category_name' => $products->main_category_name,
                'category_id' => $products->category_id,
                'category_name' => $products->category_name,
                'sub_category_id' => $products->sub_category_id,
                'sub_category_name' => $products->sub_category_name,
                'brand_id' => $products->brand_id,
                'brand_name' => $products->brand_name,
                'store_id' => $products->store_id,
                'store_name' => $products->store_name,
                'discount_type_id' => $products->discount_type_id,
                'discount_type' => $products->discount_type,
                'product_name' => $products->product_name,
                'product_price' => $products->product_price,
                'product_tags' => $products->product_tags,
                'product_stock' => $products->product_stock,
                'product_discount' => $products->discount,
                'commission_amount' => $products->commission_amount,
                'product_image' => url($products->product_image),
                'short_description' => $products->short_description,
                'description' => $products->description,
                'is_favourite' => $products->is_favourite
            ];

            return response()->json(['data' => $data], 200);
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, request()->method(), $e->getMessage(), 0, request()->ip(), gethostname(), 1);
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
