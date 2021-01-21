<?php 

namespace App\Providers; 

use App\Interfaces\IBaseRepositoryInterface; 
use App\Interfaces\UserRepositoryInterface; 
use App\Repositories\UserRepository; 
use App\Repositories\ProductRepository; 
use App\Repositories\BaseRepository; 
use Illuminate\Support\ServiceProvider; 
use App\Interfaces\ProductRepositoryInterface; 


class RepositoryServiceProvider extends ServiceProvider 
{ 
   
   public function register() 
   { 
       $this->app->bind(IBaseRepositoryInterface::class, BaseRepository::class);
       $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
       $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
   }
}