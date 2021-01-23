<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $primaryKey = "id_subcategory";
    public $timestamps = false;
    protected $fillable = [
        'name_subcategory', 'parent_subcategory',
    ];
}
