<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "products";
    protected $fillable = [
        "name",
        "slug",
        "price",
        "thumbnail",
        "qty",
        "description",
        "category_id",
    ];


    public function category(){
        return $this->belongsTo(Category::class);
    }

}
