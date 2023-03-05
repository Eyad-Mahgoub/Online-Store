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


    /**
     * Index page of the Category Page in admin Panel
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(): \Illuminate\Contracts\View\View | \Illuminate\Contracts\View\Factory
    {
        $categories = $this->categoryRepository->all();
        return view('', compact('categories'));
    }

    /**
     * Create a new Category Page
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create(): \Illuminate\Contracts\View\View | \Illuminate\Contracts\View\Factory
    {
        return view('');
    }

    /**
     * Saves a new category into the database
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $this->categoryRepository->store($data);

        return redirect()->back();
    }


    /**
     * Edit a Category Page
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Category $category): \Illuminate\Contracts\View\View | \Illuminate\Contracts\View\Factory
    {
        return view('', compact('category'));
    }


    /**
     * Updates a Category Record in the database
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $this->categoryRepository->update($request->id, $data);

        return redirect()->back();
    }

    /**
     * Deletes a Cateogory Record from the database
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category): \Illuminate\Http\RedirectResponse
    {
        $this->categoryRepository->destroy($category->id);

        return redirect()->back();
    }
}
