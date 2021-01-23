<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Support\Collection;use Illuminate\Support\Facades\Storage;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{

    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

}
