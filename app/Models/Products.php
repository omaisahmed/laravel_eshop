<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Coderflex\Laravisit\Concerns\CanVisit;
use Coderflex\Laravisit\Concerns\HasVisits;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model implements CanVisit
{
    use HasFactory;
    use HasVisits;
    protected $table = "products";
    protected $fillable = [
        'cat_id',
        'name',
        'slug',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'image',
        'qty',
        'tax',
        'status',
        'trending',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'cat_id');
    }

    // public function scopeRelatedProducts($query, $count = 10, $inRandomOrder = true)
    // {
    //     $query = $query->where('slug', '!=', $this->slug);

    //     if ($inRandomOrder) {
    //         $query->inRandomOrder();
    //     }

    //     return $query->take($count);
    // }


}

