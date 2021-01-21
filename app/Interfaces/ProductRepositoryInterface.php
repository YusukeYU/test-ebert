<?php
namespace App\Interfaces;

use App\Model\Product;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface
{
   public function all(): Collection;
}