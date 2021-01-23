<?php
namespace App\Interfaces;

use App\Model\Subcategory;
use Illuminate\Support\Collection;

interface SubcategoryRepositoryInterface
{
   public function all(): Collection;
}