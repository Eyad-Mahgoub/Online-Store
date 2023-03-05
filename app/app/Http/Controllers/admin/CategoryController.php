<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\Interface\CategoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    private $categoryRepository;

    public function __construct(CategoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->all();
        return view('', compact('categories'));
    }

    public function create()
    {
        return view('');
    }

    public function store(Request $request)
    {
        $data = $request->validated();
        $this->categoryRepository->store($data);

        return redirect()->back();
    }

    public function edit(Category $category)
    {
        return view('', compact('category'));
    }

    public function update(Request $request)
    {
        $data = $request->validated();
        $this->categoryRepository->update($request->id, $data);

        return redirect()->back();
    }

    public function destroy(Category $category)
    {
        $this->categoryRepository->destroy($category->id);

        return redirect()->back();
    }
}
