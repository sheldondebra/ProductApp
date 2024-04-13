<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createproduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        $product = new Products();
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
        return redirect()->back()->with('success', 'Product created successfully');

    }
}
