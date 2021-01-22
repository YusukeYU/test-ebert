<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = "id_category";
    public $timestamps = false;
    protected $fillable = [
        'parent_category', 'name_category'
    ];
}
