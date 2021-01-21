<?php

namespace App\Http\Controllers;
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
    
    public function store(Request $request)
    {
        $this->productRepository->createProduct($request);
        return redirect()->route('products.index');
    }
     /*
 
    public function store(StoreUserRequest $request)
    {
        $this->userRepository->create((array)$request->all());
        return redirect()->route('users.index');
    }
    public function find(Request $request)
    {
      return view('admin.pages.user.index',['users' => $this->userRepository->findRegisterSimilar('name_user',$request->name_user)]);
    }
    public function update(EditUserRequest $request, $id)
    {
        $request = $request->except(['_token','_method']);
        $this->userRepository->update($request,$id, 'id_user');
        return redirect()->route('users.index');
    }
    public function destroy($id)
    {
        $this->userRepository->delete($id);
        return redirect()->route('users.index');
    }
    */


}
