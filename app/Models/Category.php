<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    // 一つのカテゴリーは、多くの商品を持っているということ！ 
    public function products()
    {
        return $this->hasMany(Product::class,'category_id');
    }
}
