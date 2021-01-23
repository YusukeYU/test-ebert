<?php

namespace App\Repositories;

use App\Interfaces\SubcategoryRepositoryInterface;
use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Collection;use Illuminate\Support\Facades\Storage;

class SubcategoryRepository extends BaseRepository implements SubcategoryRepositoryInterface
{

    public function __construct(Subcategory $model)
    {
        parent::__construct($model);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }
    public function allWithCategories()
    {
        $queryBuilder = $this->model->leftJoin('categories', 'categories.id_category', 
        'subcategories.parent_subcategory')->get();
    
        return $queryBuilder;

    }
    public function findSubcategorySimilar($name)
    {
        
        $queryBuilder = $this->model->leftJoin('categories','categories.id_category',
        'subcategories.parent_subcategory')->where('subcategories.name_subcategory', 'like', "$name%")
        ->get();

        return $queryBuilder;

    }
    public function findById($id)
    {
        return DB::select('SELECT *
        FROM subcategories AS A
        LEFT JOIN categories AS B ON A.parent_subcategory = B.id_category WHERE A.id_subcategory = :id',
        ['id' => $id]);
    }
}
