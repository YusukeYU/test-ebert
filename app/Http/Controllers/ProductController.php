<?php

namespace App\Http\Controllers;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    private $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function index()
    {
        return view('admin.pages.product.index', ['products' => $this->productRepository->paginate(5)]);
    }
   
    public function edit($id)
    {
            return view('admin.pages.product.edit',['product' => $this->productRepository->find($id)]);
    }
    public function create()
    {
        return view('admin.pages.product.create');
    }
    
    public function store(StoreProductRequest $request)
    {
        $this->productRepository->createProduct($request);
        return redirect()->route('products.index');
    }
    public function find(Request $request)
    {
      return view('admin.pages.product.index',['products' => $this->productRepository->findRegisterSimilar('name_product',$request->name_product)]);
    }

    public function destroy($id)
    {
        $this->productRepository->delete($id);
        return redirect()->route('products.index');
    }
     
    public function update(Request $request, $id)
    {
        $this->productRepository->updateProduct($request,$id, 'id_product');
        return redirect()->route('products.index');
    }
    


}
