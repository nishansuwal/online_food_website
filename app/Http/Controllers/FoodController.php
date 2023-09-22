<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use File;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::all();
        return view ('admin/food/index')->with('foods', $foods);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin/food/add');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
 {
    $requestData = $request->all();
    if ($request->hasFile('images')) {
        $fileNames = time() . $request->file('images')->getClientOriginalName();
        $path = $request->file('images')->storeAs('foods', $fileNames, 'public');
    } else {
        $path = '';
    }
    // dd($path);
    $food = new Food([
        'image' => $path,
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'category' => $request->category,
    ]);

    $savefood = $food->save();

    if ($savefood) {
        return redirect()->route('admin.food.index')->with('success', 'Data Is Successfully added.');
    } else {
        return view('admin/food/add')->with('error', 'Something went wrong.');
    }
 }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        $foods = Food::all();
        return view ('user.home')->with('foods', $foods);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $food = Food::find($id);
        return view('admin.food.edit')->with('food', $food);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $food = Food::find($id);
        if ($request->hasFile('images')) {
            $newImage = $request->file('images');
            $fileName = time() . $newImage->getClientOriginalName();
            $path = $newImage->storeAs('foods', $fileName, 'public');

            // Check if the old image exists and delete it
            if (File::exists(public_path('/storage/' . ($food->image)))) {
                File::delete(public_path('/storage/' .($food->image)));
            }

            $food->image = $path;
        }
        // dd($path);
        $food->name = $request->name;
        $food->description = $request->description;
        $food->price = $request->price;
        $food->category = $request->category;
        $savefood = $food->save();

        if ($savefood) {
            return redirect()->route('admin.food.index')->with('success', 'Data Is Successfully edited.');
        } else {
            return back()->with('error', 'Something went wrong.');
        }
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $food = Food::find($id);
        $food->delete();
        if($food) {
           return redirect()->route('admin.food.index')->with('success', 'contact has been deleted successfully.');
        }else {
               return redirect()->route('admin.food.index')->with('error', 'something went wrong.');
        }
    }
}


