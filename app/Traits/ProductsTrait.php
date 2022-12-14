<?php
namespace App\Traits;

use App\Models\Products;
 
trait ProductsTrait {

    public function productsAll() 
    {
        return Products::orderBy('name', 'asc')->where('status', '1')->get();
    }
  
}