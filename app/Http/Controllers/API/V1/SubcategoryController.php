<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\V1\SubcategoryRequest;
use App\Http\Resources\SubcategoryCollection;
use App\Models\Subcategory;
use App\Services\UploadService;
use Illuminate\Http\Request;

class SubcategoryController extends BaseController
{
    protected $subcategory;

    public function __construct(Subcategory $subcategory)
    {
        $this->subcategory = $subcategory;
    }

    public function index(Request $request)
    {
        $subcategory = $this->subcategory;

        if ($request->search) {
            $subcategory = $subcategory::where('name', 'like', '%' . $request->search . '%');
        }

        return new SubcategoryCollection($subcategory->paginate(10));
    }

    public function store(SubcategoryRequest $request)
    {
        $filePath = null;

        if (!$request->validated()) {
            return $this->sendError('Validation Error.', $request->validator->errors());
        }

        if ($request->hasFile('image')) {
            $filePath = UploadService::saveFile($request->file('image'), 'images/subcategory/');
        }

        $subcategory = $this->subcategory::create([
            'name' => $request['name'],
            'category_id' => $request['category_id'],
            'status' => $request['status'],
            'image' => $filePath,
        ]);

        return $this->sendResponse($subcategory, 'Subcategory Created Successfully');
    }

    public function update(SubcategoryRequest $request, $id)
    {
        $subcategory = $this->subcategory::findOrFail($id);
        $filePath = $subcategory->image;

        if (!empty($request->file('image'))) {
            $filePath = UploadService::saveFile($request->file('image'), 'images/subcategory/', $filePath);
        }

        $subcategory->update([
            'name' => $request['name'],
            'category_id' => $request['category_id'],
            'status' => $request['status'],
            'image' => $filePath,
        ]);

        return $this->sendResponse($subcategory, 'Subcategory Information has been updated');
    }

    public function destroy($id)
    {
        $subcategory = $this->subcategory->findOrFail($id);
        if ($subcategory->delete()) {
            UploadService::deleteFile($subcategory->image);
        }

        return $this->sendResponse([$subcategory], 'Subcategory has been deleted');
    }
}
