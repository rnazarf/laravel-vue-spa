<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\V1\BannerRequest;
use App\Http\Resources\BannerCollection;
use App\Models\Banner;
use App\Services\UploadService;
use Illuminate\Http\Request;

class BannerController extends BaseController
{
    protected $banner;

    public function __construct(Banner $banner)
    {
        $this->banner = $banner;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $banners = $this->banner;

        if ($request->search) {
            $banners = $banners::where('title', 'like', '%' . $request->search . '%');
        }

        $result = $banners->orderBy('id', 'desc')->paginate(3);

        return new BannerCollection($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $filePath = null;

        if (!$request->validated()) {
            return $this->sendError('Validation Error.', $request->validator->errors());
        }
        if ($request->hasFile('image')) {
            $filePath = UploadService::saveFile($request->file('image'), 'images/banners/');
        }

        $banner = $this->banner::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'image' => $filePath,
            'status' => $request['status'],
        ]);

        return $this->sendResponse($banner, 'Banner created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateStatus($id)
    {
        $banner = $this->banner::findOrFail($id);

        $banner->status = $banner->status == 'Y' ? 'N' : 'Y';
        $banner->save();

        return $this->sendResponse($banner, 'Banner status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = $this->banner->findOrFail($id);
        if ($banner->delete()) {
            UploadService::deleteFile($banner->image);
        }
        return $this->sendResponse([$banner], 'Banner deleted successfully.');
    }
}
