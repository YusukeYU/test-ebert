<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use App\Tools\Tools;
use Illuminate\Support\Collection;use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

        $val_product = Tools::convertMoneyToDBDecimal($request->real);
        
        $this->model->name_product = $request->name_product;
        $this->model->des_product = $request->des_product;
        $this->model->photo_product = $path;
        $this->model->category_product = (int) $request->category_product;
        $this->model->subcategory_product = (int)$request->subcategory_product;
        $this->model->val_product = $val_product;
        
        
        $this->model->save();
    }

    public function updateProduct($request, $id)
    {

        $val_product = Tools::convertMoneyToDBDecimal($request->real);
        
        $this->model = $this->model->find($id);
        if ($request->hasFile('photo_product')) {
            //deletando foto antiga
            Storage::delete($this->model->photo_product);
            //salvando nova foto
            $path = $request->file('photo_product')->store('public/products');
            $this->model->photo_product = $path;
        }
        $request = $request->except(['_token', '_method']);
        $this->model->name_product = $request['name_product'];
        $this->model->des_product = $request['des_product'];
        $this->model->category_product = $request['category_product'];
        $this->model->subcategory_product = $request['subcategory_product'];
        $this->model->val_product = $val_product;
        $this->model->save();

    }

    public function loadCategories()
    {
        $categories = DB::select('SELECT *
        FROM categories');
        $subcategories = DB::select('SELECT *
         FROM subcategories');
        return ['categories' => $categories, 'subcategories' => $subcategories];
    }

    public function filterByCategory($id,$name)
    {
        //percorrendo sub categoria.

        // $queryBuilder = $this->model->whereHas('categories');

        // return $queryBuilder;

        $sub = DB::select(' SELECT * FROM subcategories  WHERE id_subcategory =  :id AND name_subcategory = :name',
            ['id' => $id,'name' =>$name]);
        if (isset($sub[0]->id_subcategory) && $sub[0]->id_subcategory> 0) {
            $data = DB::select(' SELECT * FROM products AS prod 
            LEFT JOIN subcategories AS cat ON cat.id_subcategory = prod.subcategory_product  WHERE cat.id_subcategory =  :id',
            ['id' => $id]);
            return $data;
        } else {
            //percorrendo categoria.
            $data2 = DB::select(' SELECT * FROM products AS prod 
            LEFT JOIN categories AS cat ON cat.id_category = prod.category_product  WHERE cat.id_category =  :id',
                ['id' => $id]);
            return $data2;
        }

    }

}


