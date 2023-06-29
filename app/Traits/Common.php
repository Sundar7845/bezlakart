<?php

namespace App\Traits;

use App\Enums\MenuPermissionType;
use App\Models\Brand;
use App\Models\BusinessSetting;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Log;
use App\Models\MainCategory;
use App\Models\Menu;
use App\Models\Products;
use App\Models\State;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\UserRolePermissions;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

trait Common
{
    public function Log($transaction_name, $mode, $log_message, $user_id, $ip_address, $system_name, $is_app = 0)
    {
        Log::create([
            'transaction_name' => $transaction_name,
            'mode' => $mode,
            'log_message' => $log_message,
            'user_id' => $user_id,
            'ip_address' => $ip_address,
            'system_name' =>  $system_name,
            'is_app' =>  $is_app,
            'log_date' => Carbon::now()
        ]);
    }

    public function fileUpload($fileinput, $filepath, $fileName)
    {
        $fileinput->move(public_path($filepath), $fileName);
        return $filepath . '/' . $fileName;
    }

    public function generateRandom($digit)
    {
        $min = pow(10, $digit - 1);
        $max = pow(10, $digit) - 1;
        return rand($min, $max);
    }

    //User Permissions-Start//
    public function getMenuUrl()
    {
        $previousUrl = url()->previous();
        $path = parse_url($previousUrl, PHP_URL_PATH);
        $segments = explode('/', $path);
        $menuUrl = '/' . $segments[1];

        return $menuUrl;
    }

    public function chkUserMenuPermission()
    {
        $menu = Menu::where('menu_url', $this->getMenuUrl())->first();
        if ($menu) {
            $chkUserFilePermission = UserRolePermissions::select('is_edit', 'is_delete', 'is_view', 'is_print', 'is_approval')
                ->where('user_id', Auth::user()->id)
                ->where('menu_id', $menu->id)
                ->first();
            return $chkUserFilePermission;
        }
    }

    public function chkUserHasPermission()
    {
        $menu = Menu::where('menu_url', $this->getMenuUrl())->first();
        if ($menu) {
            $chkUserHasPermission = UserRolePermissions::where('user_id', Auth::user()->id)
                ->where('menu_id', $menu->id)
                ->first();
            return ($chkUserHasPermission ? true : false);
        } else {
            return false;
        }
    }

    public function isUserHavePermission($permissionType)
    {
        if (Auth::user()->id == 1) {
            return true;
        }

        $userMenuPermission = $this->chkUserMenuPermission();

        switch ($permissionType) {
            case MenuPermissionType::Edit:
                return ($userMenuPermission->is_edit == 1);
            case MenuPermissionType::Delete:
                return ($userMenuPermission->is_delete == 1);
            case MenuPermissionType::View:
                return ($userMenuPermission->is_view == 1);
            case MenuPermissionType::Print:
                return ($userMenuPermission->is_print == 1);
            case MenuPermissionType::Approval:
                return ($userMenuPermission->is_approval == 1);
        }
    }
    //User Permissions-End//

    public function getCountries()
    {
        return Country::orderBy('country_name', 'asc')->get(["country_name", "id", "country_code", "is_active"]);
    }

    public function getStates($country_id = 101, $all = 0)
    {
        return State::where('country_id', $country_id)
            ->where($all ? [] : ['is_active' => 1])
            ->orderBy('state_name', 'asc')
            ->select('state_name', 'state_code', 'id', 'is_active')
            ->get();
    }

    public function getCities($state_id, $all = 0)
    {
        return City::where('state_id', $state_id)
            ->where($all ? [] : ['is_active' => 1])
            ->orderBy('city_name', 'asc')
            ->select('city_name', 'id', 'is_active')
            ->get();
    }

    public function BussinessSettingdetails()
    {
        return BusinessSetting::first();
    }

    function userCreate($user_name, $email, $password, $store_id, $display_name, $mobile, $role_id, $is_active, $created_by)
    {
        User::create([
            'user_name' => $user_name,
            'email' => $email,
            'password' => Hash::make($password),
            'store_id' => $store_id,
            'display_name' => $display_name,
            'mobile' =>  $mobile,
            'role_id' => $role_id,
            'is_active' => $is_active,
            'created_by' => $created_by
        ]);
    }

    function updateUser($user_name, $email, $password, $store_id, $display_name, $mobile, $role_id, $is_active, $created_by)
    {
        User::where('store_id', $store_id)->update([
            'user_name' => $user_name,
            'email' => $email,
            'password' => Hash::make($password),
            'store_id' => $store_id,
            'display_name' => $display_name,
            'mobile' =>  $mobile,
            'role_id' => $role_id,
            'is_active' => $is_active,
            'created_by' => $created_by
        ]);
    }

    public function getRoleId($email)
    {
        return User::where('email', $email)->pluck('role_id')->first();
    }

    function getMainCategories()
    {
        return MainCategory::where('is_active', 1)->get();
    }

    function getCategories()
    {
        return Category::select('categories.*', 'main_categories.main_category_name')
            ->join('main_categories', 'main_categories.id', 'categories.main_category_id')
            ->where('categories.is_active', 1)
            ->whereNull('categories.deleted_at')
            ->get();
    }

    function getSubCategories()
    {
        return SubCategory::select('sub_categories.*', 'main_categories.main_category_name', 'categories.category_name')
            ->join('main_categories', 'main_categories.id', 'sub_categories.main_category_id')
            ->join('categories', 'categories.id', 'sub_categories.category_id')
            ->where('sub_categories.is_active', 1)
            ->whereNull('sub_categories.deleted_at')
            ->get();
    }

    function getBrands()
    {
        return Brand::select('brands.*', 'sub_categories.sub_category_name')
            ->join('sub_categories', 'sub_categories.id', 'brands.sub_category_id')
            ->where('brands.is_active', 1)
            ->whereNull('brands.deleted_at')
            ->get();
    }

    function getProducts($user_id = 0)
    {
        // if ($user_id < 0) {
        //     $product = Products::select(
        //         'products.*',
        //         'main_categories.main_category_name',
        //         'categories.category_name',
        //         'sub_categories.sub_category_name',
        //         'brands.brand_name',
        //         'stores.store_name',
        //         'discount_types.discount_type'
        //     )
        //         ->join('main_categories', 'main_categories.id', 'products.main_category_id')
        //         ->join('categories', 'categories.id', 'products.category_id')
        //         ->join('sub_categories', 'sub_categories.id', 'products.sub_category_id')
        //         ->join('brands', 'brands.id', 'products.brand_id')
        //         ->join('stores', 'stores.id', 'products.store_id')
        //         ->join('discount_types', 'discount_types.id', 'products.discount_type_id')
        //         ->where('products.is_active', 1)
        //         ->whereNull('products.deleted_at')
        //         ->get();
        // } else {
        //     $product = Products::select(
        //         'products.*',
        //         'main_categories.main_category_name',
        //         'categories.category_name',
        //         'sub_categories.sub_category_name',
        //         'brands.brand_name',
        //         'stores.store_name',
        //         'discount_types.discount_type',
        //         'wishlists.user_id',
        //         'wishlists.is_favourite'
        //     )
        //         ->join('main_categories', 'main_categories.id', 'products.main_category_id')
        //         ->join('categories', 'categories.id', 'products.category_id')
        //         ->join('sub_categories', 'sub_categories.id', 'products.sub_category_id')
        //         ->join('brands', 'brands.id', 'products.brand_id')
        //         ->join('stores', 'stores.id', 'products.store_id')
        //         ->join('discount_types', 'discount_types.id', 'products.discount_type_id');

        //     $product->leftJoin('wishlists', function ($join) use ($user_id) {
        //         $join->on('wishlists.product_id', 'products.id')
        //             ->where('wishlists.user_id',  $user_id);
        //     });
        //     $product->setBindings(array_merge($product->getBindings(), [$user_id]));

        //     $product = $product->get();
        // }
        $product = Products::select(
            'products.*',
            'main_categories.main_category_name',
            'categories.category_name',
            'sub_categories.sub_category_name',
            'brands.brand_name',
            'stores.store_name',
            'discount_types.discount_type',
            'wishlists.user_id',
            'wishlists.is_favourite'
        )
            ->join('main_categories', 'main_categories.id', 'products.main_category_id')
            ->join('categories', 'categories.id', 'products.category_id')
            ->join('sub_categories', 'sub_categories.id', 'products.sub_category_id')
            ->join('brands', 'brands.id', 'products.brand_id')
            ->join('stores', 'stores.id', 'products.store_id')
            ->join('discount_types', 'discount_types.id', 'products.discount_type_id')
            ->leftJoin('wishlists', function ($join) use ($user_id) {
                $join->on('wishlists.product_id', 'products.id')
                    ->where(function ($query) use ($user_id) {
                        $query->where('wishlists.user_id', $user_id)
                            ->orWhereNull('wishlists.user_id');
                    });
            })
            ->where('products.is_active', 1)
            ->whereNull('products.deleted_at');

        // $product = $product->get();


        return $product;
    }

    function getProductDetail($product_id, $user_id = 0)
    {
        $productQuery = Products::select(
            'products.*',
            'main_categories.main_category_name',
            'categories.category_name',
            'sub_categories.sub_category_name',
            'brands.brand_name',
            'stores.store_name',
            'discount_types.discount_type'
        )
            ->join('main_categories', 'main_categories.id', 'products.main_category_id')
            ->join('categories', 'categories.id', 'products.category_id')
            ->join('sub_categories', 'sub_categories.id', 'products.sub_category_id')
            ->join('brands', 'brands.id', 'products.brand_id')
            ->join('stores', 'stores.id', 'products.store_id')
            ->join('discount_types', 'discount_types.id', 'products.discount_type_id')
            ->where('products.is_active', 1)
            ->where('products.id', $product_id)
            ->whereNull('products.deleted_at');

        if ($user_id >= 0) {
            $productQuery->leftJoin('wishlists', function ($join) use ($user_id) {
                $join->on('wishlists.product_id', 'products.id')
                    ->where('wishlists.user_id', $user_id);
            })
                ->selectRaw('wishlists.user_id, wishlists.is_favourite');
        }

        $product = $productQuery->first();

        return $product;
    }

    function getProductList($products, $user_id = 0)
    {
        $responseData = [];

        $responseData['products'] = [];
        foreach ($products as $item) {
            $productDetails['product_id'] = $item->id;
            $productDetails['main_category_id'] = $item->main_category_id;
            $productDetails['main_category_name'] = $item->main_category_name;
            $productDetails['category_id'] = $item->category_id;
            $productDetails['category_name'] = $item->category_name;
            $productDetails['sub_category_id'] = $item->sub_category_id;
            $productDetails['sub_category_name'] = $item->sub_category_name;
            $productDetails['brand_id'] = $item->brand_id;
            $productDetails['brand_name'] = $item->brand_name;
            $productDetails['store_id'] = $item->store_id;
            $productDetails['store_name'] = $item->store_name;
            $productDetails['discount_type_id'] = $item->discount_type_id;
            $productDetails['discount_type'] = $item->discount_type;
            $productDetails['product_name'] = $item->product_name;
            $productDetails['product_price'] = $item->product_price;
            $productDetails['product_tags'] = $item->product_tags;
            $productDetails['product_stock'] = $item->product_stock;
            $productDetails['product_discount'] = $item->discount;
            $productDetails['commission_amount'] = $item->commission_amount;
            $productDetails['product_image'] = url($item->product_image);
            $productDetails['short_description'] = $item->short_description;
            $productDetails['description'] = $item->description;
            $productDetails['is_favourite'] = $item->is_favourite;
            array_push($responseData['products'], $productDetails);
        }

        return $responseData;
    }
}
