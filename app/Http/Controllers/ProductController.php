<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function addProducts(){
        $addProduct = new Products();
        $addProduct->create([
            'name' => 'Product 1',
            'price' => 100
            
        ])
    }
}
