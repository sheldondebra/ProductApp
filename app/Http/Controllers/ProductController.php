<?php

namespace App\Http\Controllers;

use App\Models\Vendors;
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
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'vendor_id' => 'required|exists:vendors,id',
            // Add other validation rules as needed
        ]);

        $product = Products::create($request->all());
        return response()->json($product, 200);
    }

    public function show($id)
    {
        $product = Products::findOrFail($id);
        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'string|max:255',
            'price' => 'numeric',
            'vendor_id' => 'exists:vendors,id',
            'description' => 'nullable|string',
        ]);

        $product = Products::findOrFail($id);
        $product->update($request->all());
        return response()->json($product);
    }

    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();
        return response()->json($product, 200);
    }
    public function findProductAndVendor($productId)
    {
        try {
    
            $product = Products::with('vendor')->findOrFail($productId);
            return response()->json($product);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Product not found.'], 404);
        }
    }
    public function findProductsByVendor($vendorId)
    {
        try {

            $vendor = Vendors::with('products')->findOrFail($vendorId);
            return response()->json($vendor->products);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Vendor not found.'], 404);
        }
    }
}
