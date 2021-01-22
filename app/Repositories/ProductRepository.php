<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Support\Collection;use Illuminate\Support\Facades\Storage;

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
        $this->model->val_product = (float) ((string) $request->real . '.' . (string) $request->cents);
        $this->model->save();
    }

    public function updateProduct($request, $id)
    {
        $this->model = $this->model->find($id);
        if ($request->hasFile('photo_product')) {
            //deletando foto antiga
            Storage::delete($this->model->photo_product);
            //salvando nova foto
            $path = $request->file('photo_product')->store('public/products');
            $this->model->photo_product = $path;
        }
        $request = $request->except(['_token','_method']);
        $this->model->name_product = $request['name_product'];
        $this->model->des_product = $request['des_product'];    
        $this->model->val_product = (float) ((string) $request['real'] . '.' . (string) $request['cents']);
        $this->model->save();
    }

}
