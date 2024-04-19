<?php

namespace App\Models;

use App\Models\Vendors;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;


    protected $fillable = [
        'product_name',
        'price',
        'description'
   ];

    public function vendor()
    {
        return $this->belongsTo(Vendors::class);
    }

}
