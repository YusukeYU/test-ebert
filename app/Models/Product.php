<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = "id_product";
    public $timestamps = false;
    protected $fillable = [
        'name_product', 'val_product', 'des_product','photo_product',
    ];

}
