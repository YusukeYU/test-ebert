<?php
namespace App\Interfaces;

use App\Model\Category;
use Illuminate\Support\Collection;

interface CategoryRepositoryInterface
{
   public function all(): Collection;
}