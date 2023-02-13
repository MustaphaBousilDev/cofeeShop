<?php

namespace App\Models;
use  App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product','category_id','description','image','price'
    ];
    public function category(){
        //relation one to one berween id(users) and user_id(categories)
        return $this->hasOne(Category::class,'id','category_id');
    }
   
    use HasFactory;
}
