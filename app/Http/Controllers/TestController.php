<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use DB;
use App\Http\Resources\Products as ProductResource;

class TestController extends Controller
{
    public function store(Request $request){                    //storing the data in database 
        $product = new Products;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->save();
        return response()->json(new ProductResource($product) ,201);
    }

    public function fetchById(int $id){                          //finding data by id
        $product = Products::findOrfail($id);
        return response()->json(new ProductResource($product));
    }

    public function updateById(Request $request, $id){

        $product = Products::findOrfail($id);                    //update the fields in table using testcases
        $product->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'price' => $request->price
        ]);
        return response()->json(new ProductResource($product) ,201);
    }

    public function deletById($id){                               //delete the fields in table using testcases
        $product = Products::findOrfail($id);
        $product->delete();
        return response()->json(null,204);

    }
}
