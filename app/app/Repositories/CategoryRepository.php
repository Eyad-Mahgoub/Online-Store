<?php

namespace App\Http\Repositories;

use App\Models\Category;
use App\Repositories\Interface\RepositoryInterface;
use Exception;

class CategoryRepository implements RepositoryInterface
{
    public function all()
    {
        return Category::all()->paginate(10);
    }

    public function find(int $id)
    {
        return Category::find($id);
    }

    public function store(array $data)
    {
        return Category::create($data);
    }

    public function update(int $id, array $data)
    {
        try {
            return Category::find($id)->update($data);
        } catch (Exception $e) {
            return false;
        }
    }

    public function destroy(int $id)
    {
        try {
            Category::destroy($id);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
