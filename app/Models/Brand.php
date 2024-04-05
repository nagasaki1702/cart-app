<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    // 一つのブランドは、たくさんの商品を持っているということ！
    // hasMany メソッドの第二引数として渡されている 'brand_id' は、リレーションシップの定義において、外部キーを指定するためのものです。
    // 具体的には、products メソッドによって定義されるリレーションシップは、Product モデルが Brand モデルに対して「多対一」の関係を持つことを示します。そして、'brand_id' はこの関係の中で、Product モデルが Brand モデルと紐付けられるための外部キーを指定しています。
    // つまり、'brand_id' は products テーブル内の Brand モデルを識別するためのカラムを指定しています。これにより、Product モデルの各レコードは、どの Brand モデルに属しているかを示す外部キーとしてこのカラムを持つことになります。
    public function products()
    {
        return $this->hasMany(Product::class,'brand_id');
    }
}
