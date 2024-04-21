<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{

    public function index()
    {
        $products = Products::all();
        return response()->json($products);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'vendor_id' => 'required|exists:vendors,id',
            // Add other validation rules as needed
        ]);

        $product = Products::create($request->all());
        return response()->json($product, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $product = Products::findOrFail($id);
        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|max:255',
            'price' => 'numeric',
            'vendor_id' => 'exists:vendors,id',
            // Add other validation rules as needed
        ]);

        $product = Products::findOrFail($id);
        $product->update($request->all());
        return response()->json($product);
    }

    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

}
