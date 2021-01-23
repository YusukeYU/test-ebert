<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function index()
    {
        $allCategories = $this->productRepository->loadCategories();
        return view('admin.pages.product.index', ['products' => $this->productRepository->paginate(5),
            'categories' => $allCategories['categories'], 'subcategories' => $allCategories['subcategories']]);
    }

    public function edit($id)
    {
        $allCategories = $this->productRepository->loadCategories();
        return view('admin.pages.product.edit', ['product' => $this->productRepository->find($id), 'categories' => $allCategories['categories'], 'subcategories' => $allCategories['subcategories']]);
    }
    public function create()
    {
        $allCategories = $this->productRepository->loadCategories();
        return view('admin.pages.product.create', ['categories' => $allCategories['categories'], 'subcategories' => $allCategories['subcategories']]);
    }

    public function store(StoreProductRequest $request)
    {
        $this->productRepository->createProduct($request);
        return redirect()->route('products.index');
    }
    public function find(Request $request)
    {
        $allCategories = $this->productRepository->loadCategories();
        return view('admin.pages.product.index', ['products' => $this->productRepository->findRegisterSimilar('name_product', $request->name_product), 'categories' => $allCategories['categories'], 'subcategories' => $allCategories['subcategories']]);
    }

    public function destroy($id)
    {
        $this->productRepository->delete($id);
        return redirect()->route('products.index');
    }

    public function update(EditProductRequest $request, $id)
    {
        $this->productRepository->updateProduct($request, $id, 'id_product');
        return redirect()->route('products.index');
    }

    public function filterByCategory($id, $name)
    {
        $allCategories = $this->productRepository->loadCategories();
        return view('admin.pages.product.index',
            ['products' => $this->productRepository->filterByCategory($id, $name),
                'categories' => $allCategories['categories'],
                'subcategories' => $allCategories['subcategories']]);
    }

}
