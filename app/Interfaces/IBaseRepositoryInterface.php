<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface IBaseRepositoryInterface
{
   public function create(array $attributes): Model;

   public function find($id): ?Model;

   public function delete($id);
}