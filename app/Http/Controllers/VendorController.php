<?php

namespace App\Http\Controllers;

use App\Models\Vendors;
use App\Models\Products;
use Illuminate\Http\Request;

class VendorController extends Controller
{  // List all vendors
    public function index()
    {
        $vendors = Vendors::all();
        return response()->json($vendors);
    }

    // Create a new vendor
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:vendors,email',

        ]);

        $vendor = Vendors::create($request->all());
        return response()->json($vendor, 200);
    }

    // Show a specific vendor
    public function show($id)
    {
        $vendor = Vendors::findOrFail($id);
        return response()->json($vendor);
    }

    // Update a vendor
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|unique:vendors,email,' . $id,
            // Add other validation rules as needed
        ]);

        $vendor = Vendors::findOrFail($id);
        $vendor->update($request->all());
        return response()->json($vendor);
    }

    // Delete a vendor
    public function destroy($id)
    {
        $vendor = Vendors::findOrFail($id);
        $vendor->delete();
        return response()->json($vendor,200);
    }

}
