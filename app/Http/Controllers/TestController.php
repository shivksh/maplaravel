<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class TestController extends Controller
{
    public function store(Request $request){

        $product = new Products;
        $product->name = $request->name;
        $product->slug = str_slug($request->name);
        $product->price = $request->price;
        $product->save();
        return response()->json([],201);
    }
}
