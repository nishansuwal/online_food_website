<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request, $foodId)
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $existingCartItem = Cart::where(['user_id' => $userId, 'food_id' => $foodId])->first();

            if ($existingCartItem) {
                $existingCartItem->update([
                    'quantity' => $existingCartItem->quantity + 1,
                ]);
            } else {
                Cart::create([
                    'user_id' => $userId,
                    'food_id' => $foodId,
                    'quantity' => 1, // You can adjust the quantity as needed
                ]);
            }
            return redirect()->route('home');
        }

        // Handle the case when the user is not authenticated
        // You can redirect them to the login page or show an error message
    }

    public function viewCart()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $userCart = User::where('id', $userId)->first();
            $userCarts = Cart::with('food')->where(['user_id' => $userId])->get();

            return view('client.addtocart', ['userCart' => $userCart, 'userCarts' => $userCarts]);
        }

        // Handle the case when the user is not authenticated
        // You can redirect them to the login page or show an error message
    }
}
