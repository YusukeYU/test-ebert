<?php 

namespace App\Providers; 

use App\Interfaces\IBaseRepositoryInterface; 
use App\Interfaces\UserRepositoryInterface; 
use App\Repositories\UserRepository; 
use App\Repositories\BaseRepository; 
use Illuminate\Support\ServiceProvider; 


class RepositoryServiceProvider extends ServiceProvider 
{ 
   
   public function register() 
   { 
       $this->app->bind(IBaseRepositoryInterface::class, BaseRepository::class);
       $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
   }
}