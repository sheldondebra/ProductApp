<?php

namespace App\Http\Controllers;

use App\Models\Vendors;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function store(Request $request){
    Vendors::create([
        'vendorname' => $request->name,
        'phone_number' => $request->phone_number,
        'product_name'=> $request->product_name,

    ]);
    return response()->json([
        'status' => 200,
        'message' => 'Vendor created successfully'
    ]);
    }
}
