<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use File;

class PageController extends Controller
{
    public function home()
    {
        $foods = Food::all();
        return view ('client/home')->with('foods', $foods);
    }
}
