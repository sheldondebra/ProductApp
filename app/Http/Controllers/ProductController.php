<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function createproduct(Request $request)
    {

        Products::create([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'description' => $request->description

        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Product created successfully'
        ]);

    }

    public function showproduct()
    {

        $products = Products::all();
        return response()->json([
            'status' => 200,
            'products' => $products
        ]);
    }
}
