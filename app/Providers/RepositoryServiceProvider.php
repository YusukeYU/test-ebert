<?php 

namespace App\Providers; 

use App\Interfaces\IBaseRepositoryInterface; 
use App\Interfaces\UserRepositoryInterface; 
use App\Interfaces\CategoryRepositoryInterface; 
use App\Interfaces\ProductRepositoryInterface; 
use App\Interfaces\SubcategoryRepositoryInterface; 
use App\Repositories\UserRepository; 
use App\Repositories\ProductRepository; 
use App\Repositories\CategoryRepository; 
use App\Repositories\SubcategoryRepository; 
use App\Repositories\BaseRepository; 
use Illuminate\Support\ServiceProvider; 



class RepositoryServiceProvider extends ServiceProvider 
{ 
   
   public function register() 
   { 
       $this->app->bind(IBaseRepositoryInterface::class, BaseRepository::class);
       $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
       $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
       $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
       $this->app->bind(SubcategoryRepositoryInterface::class, SubcategoryRepository::class);
   }
}