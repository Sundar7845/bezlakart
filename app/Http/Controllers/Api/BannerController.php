<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Traits\Common;
use App\Traits\ResponseAPI;
use Exception;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    use Common;
    use ResponseAPI;

    function getBanner()
    {
        try {
            $responseData = [];

            $responseData['banner'] = [];
            $banner =  Banner::where('banner_location_id', 1)->where('is_active', 1)->get();
            foreach ($banner as $item) {
                $bannerDetails['banner_id'] = $item->id;
                $bannerDetails['banner_image'] = url($item->banner_image);
                array_push($responseData['banner'], $bannerDetails);
            }

            return response()->json(['data' => $responseData], 200);
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, request()->method(), $e->getMessage(), 0, request()->ip(), gethostname(), 1);
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
