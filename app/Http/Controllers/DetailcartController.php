<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;
use App\Models\Food;
use App\Models\purchased;

class DetailcartController extends Controller
{
     public function viewDetail()
 {
    if (Auth::check()) {
        $userId = Auth::user()->id;
        $userCart = User::where('id', $userId)->first();
        $userCarts = Purchased::where(['user_id' => $userId])->get();

        $foodDataArray = [];

        foreach ($userCarts as $userCart) {
            foreach ($userCart as $foodId => $quantity) {
                 dd($foodId);
            }
        }

        foreach ($userCarts as $userCart) {
            $foodDataJson = $userCart->Food;
            $foodData = json_decode($foodDataJson, true);
            // dd($foodData->$quantity);
            foreach ($foodData as $foodId => $quantity) {
                    $foodItem = [
                        'food_id' => $foodId,
                        'quantity' => $quantity,
                    ];
                    $foodDataArray[] = $foodItem;
                }
            
        }

        return view('client/cartdetail', ['foodDataArray' => $foodDataArray,'userCarts' => $userCarts]);
    }
 }

    public function viewMoreDetail($id)
    {
     if (Auth::check()) {
        $userCarts = Purchased::where(['id' => $id])->get();
        $foodDataArray = [];
        foreach ($userCarts as $userCart) {
            $foodDataJson = $userCart->Food;

            // Check if foodDataJson is not empty (null)
            if (!empty($foodDataJson)) {
                $foodData = json_decode($foodDataJson, true);
                
                foreach ($foodData as $foodId => $quantity) {
                    // Create an array with food ID and quantity
                    $foodItem = [
                        'food_id' => $foodId,
                        'quantity' => $quantity,
                        
                    ];
                    // Add the food item to the main food data array
                    $foodDataArray[] = $foodItem;
                }
            }
        }
        // dd($foodDataArray);
        return view('client/cartmoredetail', ['foodDataArray' => $foodDataArray, 'userCarts' => $userCarts]);
    }
 }
 public function viewfoodDetail(){
         $foods = Purchased::all();
        return view ('admin/order/userorder')->with('foods', $foods);
 }
  
}
