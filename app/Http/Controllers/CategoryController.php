<?php

namespace App\Http\Controllers;
use App\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    private $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function index()
    {
        return view('admin.pages.category.index', ['categories' => $this->categoryRepository->paginate(5)]);
    }
    public function edit($id)
    {
            return view('admin.pages.category.edit',['category' => $this->categoryRepository->find($id),'categories' => $this->categoryRepository->all()]);
    }
    public function create()
    {
        return view('admin.pages.category.create',['categories' => $this->categoryRepository->all()]);
    }
    public function store(StoreCategoryRequest $request)
    {
        $this->categoryRepository->create((array)$request->all());
        return redirect()->route('categories.index');
    }
    public function find(Request $request)
    {
      return view('admin.pages.category.index',['categories' => $this->categoryRepository->findRegisterSimilar('name_category',$request->name_category)]);
    }

    
    public function destroy($id)
    {
        $this->categoryRepository->delete($id);
        return redirect()->route('categories.index');
    }

    public function update(Request $request, $id)
    {
        $request = $request->except(['_token','_method']);
        $this->categoryRepository->update($request,$id, 'id_category');
        return redirect()->route('categories.index');
    }
}
