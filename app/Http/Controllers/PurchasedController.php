<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;
use App\Models\purchased;

class PurchasedController extends Controller
{
    public function purchased()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $userCart = User::where('id', $userId)->first();
            $userCarts = Cart::with('food')->where(['user_id' => $userId])->get();
            return view ('client/purchased', ['userCart' => $userCart, 'userCarts' => $userCarts]);
        }
        
    }

    public function purchasedStore(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $userCart = User::where('id', $userId)->first();
            $userCarts = Cart::with('food')->where(['user_id' => $userId])->get();
            $totalPrice = 0;
            $dataArray = [];
            foreach ($userCarts as $cart) {
                $totalPrice += $cart->quantity * $cart->food->price;
                $id=$cart->food_id;
                $quantity=$cart->quantity;
                $dataArray[$id] = $quantity;
            }
            $purchased = new Purchased();
            $purchased->user_id = $userCart;
            $purchased->name = $request->name;
            $purchased->address = $request->address;
            $purchased->email = $request->email;
            $purchased->phone = $request->phone;
            $purchased->message = $request->message;
            $purchased->price = $totalPrice;
            $purchased->food = serialize($dataArray);
            $data_purchased = $purchased->save();
            if($data_purchased){
                  return redirect()->route('home')->with('success', 'Data Is Successfully added.');
             } else {
                  return view('admin/food/add')->with('error', 'Something went wrong.');
            }
        }



        }
        
    }

