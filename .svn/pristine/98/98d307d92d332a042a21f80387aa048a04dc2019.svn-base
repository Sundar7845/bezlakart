<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\Common;
use App\Traits\ResponseAPI;
use Exception;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    use Common;
    use ResponseAPI;

    function brands()
    {
        try {
            $responseData = [];

            $responseData['brand'] = [];
            $brands = $this->getBrands();
            foreach ($brands as $item) {
                $brandDetails['brand_id'] = $item->id;
                $brandDetails['sub_category_id'] = $item->sub_category_id;
                $brandDetails['sub_category_name'] = $item->sub_category_name;
                $brandDetails['brand_name'] = $item->brand_name;
                $brandDetails['brand_image'] = url($item->brand_image);
                array_push($responseData['brand'], $brandDetails);
            }

            return response()->json(['data' => $responseData], 200);
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, request()->method(), $e->getMessage(), 0, request()->ip(), gethostname(), 1);
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
