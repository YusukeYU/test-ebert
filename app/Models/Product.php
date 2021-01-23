<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use app\Models\Category;
// use app\Models\Subcategory;

class Product extends Model
{
    protected $primaryKey = "id_product";
    public $timestamps = false;
    protected $fillable = [
        'name_product', 
        'val_product', 
        'des_product',
        'photo_product',
        'category_product',
        'subcategory_product'
    ];


    // public function subCategory(){
    //     return $this->hasOne(Subcategory:class, 'subcategory_product', 'id_subcategory');
    // }

    // public function categories(){
    //     return $this->hasOne(Category::class, 'category_product', 'id_category');
    // }
    
}
