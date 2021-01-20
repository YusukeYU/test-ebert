<?php

namespace App\Repositories;

use App\Models\User;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Collection;


class UserRepository extends BaseRepository implements UserRepositoryInterface
{

   public function __construct(User $model)
   {
       parent::__construct($model);
   }

   public function all(): Collection
   {
       return $this->model->all();    
   }
   
}