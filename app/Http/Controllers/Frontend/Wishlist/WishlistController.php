<?php

namespace App\Http\Controllers\Frontend\Wishlist;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Wishlist;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function wishList($id)
    {
        $products = Products::select('products.*')
        ->join('wishlists', 'wishlists.product_id', 'products.id')
        ->where('wishlists.user_id',$id)
        ->get();

        return view('frontend.wishlist.wishlist',compact('products'));
    }

    public function WishListStore(Request $request)
    {
        if (Auth::check()) {
            $existingWishlist = Wishlist::where('user_id', Auth::user()->id)
                ->where('product_id', $request->product_id)
                ->first();

            if ($existingWishlist) {
                $existingWishlist->delete();

                $notification = array(
                    'message' => 'Removed from Wishlist',
                    'alert' => 'error'
                );

                return response()->json([
                    'response' => $notification
                ]);
            } else {
                $wishlist = Wishlist::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $request->product_id
                ]);

                $notification = array(
                    'message' => 'Added to Wishlist',
                    'alert' => 'success'
                );

                return response()->json([
                    'response' => $notification
                ]);
            }
        } else {
            $notification = array(
                'message' => 'Please Login First',
                'alert' => 'error'
            );

            return response()->json([
                'response' => $notification
            ]);
        }
    }
}
