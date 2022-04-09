<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\V1\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index(Request $request)
    {
        $categories = $this->category;

        if ($request->search) {
            $categories = $categories::where('name', 'like', '%' . $request->search . '%');
        }

        $result = $categories->orderBy('id', 'desc')->paginate(10);

        return $this->sendResponse($result, 'Category List');
    }

    public function store(CategoryRequest $request)
    {
        $category = $this->category::create([
            'name' => $request['name'],
            'description' => $request['description'],
        ]);

        return $this->sendResponse($category, 'Category Created Successfully');
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = $this->category::findOrFail($id);
        $category->update($request->all());

        return $this->sendResponse($category, 'Category Information has been updated');
    }

    public function destroy($id)
    {
        $category = $this->category->findOrFail($id);
        $category->delete();

        return $this->sendResponse([$category], 'Category has been deleted');
    }
}
