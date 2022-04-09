<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\V1\BankRequest;
use App\Models\Bank;
use App\Services\UploadService;
use Illuminate\Http\Request;

class BankController extends BaseController
{

    protected $bank;

    public function __construct(Bank $bank)
    {
        $this->bank = $bank;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $banks = $this->bank;

        if ($request->search) {
            $banks = $banks::where('name', 'like', '%' . $request->search . '%');
        }

        $result = $banks->orderBy('id', 'desc')->paginate(10);

        return $this->sendResponse($result, 'Bank List');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankRequest $request)
    {
        $filePath = null;

        if (!$request->validated()) {
            return $this->sendError('Validation Error.', $request->validator->errors());
        }

        if ($request->hasFile('logo')) {
            $filePath = UploadService::saveFile($request->file('logo'), 'images/banks/');
        }

        $bank = $this->bank::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'logo' => $filePath,
            'account_number' => $request['account_number'],
        ]);

        return $this->sendResponse($bank, 'Bank Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(BankRequest $request, $id)
    {
        $bank = $this->bank::findOrFail($id);
        $filePath = $bank->logo;

        if (!empty($request->hasFile('logo'))) {
            $filePath = UploadService::updateFile($request->file('logo'), 'images/banks/', $filePath);
        }

        $bank->update([
            'name' => $request['name'],
            'description' => $request['description'],
            'logo' => $filePath,
            'account_number' => $request['account_number'],
        ]);

        return $this->sendResponse($bank, 'Bank Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank = $this->bank->findOrFail($id);
        if ($bank->delete()) {
            UploadService::deleteFile($bank->logo);
        }
        return $this->sendResponse([$bank], 'Bank Deleted Successfully');
    }
}
