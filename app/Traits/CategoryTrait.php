<?php
namespace App\Traits;

use App\Models\Category;
 
trait CategoryTrait {

    public function categoryAll() 
    {
        return Category::all()->where('status', '1');
    }
  
}