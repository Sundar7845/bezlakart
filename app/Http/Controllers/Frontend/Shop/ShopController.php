<?php

namespace App\Http\Controllers\Frontend\Shop;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\MainCategory;
use App\Models\Products;
use App\Traits\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jorenvh\Share\Share;

class ShopController extends Controller
{
    use Common;
    public function shop()
    {
        $user_id = Auth::check() ? Auth::user()->id : 1;
        $brands = $this->getBrands();
        $maincategorys = $this->getMainCategories();
        $products = $this->getProducts($user_id)->get();
        $currentUrl = url()->current();
        $shareButtons = \Share::page($currentUrl)
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()
            ->pinterest();
        return view('frontend.shop.shop', compact('brands', 'maincategorys', 'products', 'shareButtons'));
    }
}
