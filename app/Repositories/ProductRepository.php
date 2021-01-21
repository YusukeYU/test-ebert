<?php

namespace App\Repositories;

use App\Models\Product;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;use Illuminate\Http\File;



class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{

   public function __construct(Product $model)
   {
       parent::__construct($model);
   }

   public function all(): Collection
   {
       return $this->model->all();    
   }

   public function createProduct($request)
   {  
       $path = $request->file('photo_product')->store('public/products');
       $this->model->name_product = $request->name_product;
       $this->model->des_product = $request->des_product;
       $this->model->photo_product = $path;
       $this->model->val_product = (float)((string)$request->real.'.'.(string)$request->cents);
       $this->model->save();
   }
   
}