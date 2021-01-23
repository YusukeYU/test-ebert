<?php

namespace App\Http\Controllers;
use App\Interfaces\SubcategoryRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSubcategoryRequest;

class SubcategoryController extends Controller
{
    private $subcategoryRepository;
    public function __construct(SubcategoryRepositoryInterface $subcategoryRepository)
    {
        $this->subcategoryRepository = $subcategoryRepository;
    }
      
    public function index()
    {
        return view('admin.pages.subcategory.index', ['subcategories' =>  $this->subcategoryRepository->allWithCategories()]);
    }
    
    public function edit($id , CategoryRepositoryInterface $categoryRepository)
    {
            return view('admin.pages.subcategory.edit',['subcategory' => $this->subcategoryRepository->findById($id),'categories2' =>$categoryRepository->all()]);
    }
    public function create(CategoryRepositoryInterface $categoryRepository)
    {
        return view('admin.pages.subcategory.create',['categories' => $categoryRepository->all()]);
    }
    public function store(StoreSubcategoryRequest $request)
    {
        $request = $request->except(['_token','_method']);
        $this->subcategoryRepository->create($request);
        return redirect()->route('subcategories.index');
    }
    public function find(Request $request)
    {
      return view('admin.pages.subcategory.index',['subcategories' => $this->subcategoryRepository->findSubcategorySimilar($request->name_subcategory)]);
    }
    public function destroy($id)
    {
        $this->subcategoryRepository->delete($id);
        return redirect()->route('subcategories.index');
    }
    public function update(StoreSubcategoryRequest $request, $id)
    {
        $request = $request->except(['_token','_method']);
        $this->subcategoryRepository->update($request,$id, 'id_subcategory');
        return redirect()->route('subcategories.index');
    }
    
}
