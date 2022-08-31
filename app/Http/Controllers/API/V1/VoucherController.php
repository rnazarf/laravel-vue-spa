<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\V1\VoucherRequest;
use App\Http\Resources\VoucherCollection;
use App\Http\Resources\VoucherResource;
use App\Models\Voucher;
use Illuminate\Http\Request;
use \Acadea\CollectionPaginator\CollectionPaginator;

class VoucherController extends BaseController
{
    protected $voucher;

    public function __construct(Voucher $voucher)
    {
        $this->voucher = $voucher;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vouchers = $this->voucher;

        if ($request->search) {
            $vouchers = $vouchers::where('name', 'like', '%' . $request->search . '%');
        }

        return new VoucherCollection($vouchers->paginate(4));
    }

    public function show($id)
    {
        $voucher = $this->voucher->find($id);
        return new VoucherResource($voucher);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VoucherRequest $request)
    {
        $voucher = $this->voucher::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'voucher_code' => $request['voucher_code'],
            'status' => $request['status'],
            'type_voucher' => $request['type_voucher'],
            'value' => $request['value'],
        ]);

        return $this->sendResponse($voucher, 'Voucher Created Successfully');
    }

    public function updateStatus($id)
    {
        $voucher = $this->voucher::findOrFail($id);

        $voucher->status = $voucher->status == 'Y' ? 'N' : 'Y';
        $voucher->save();

        return $this->sendResponse($voucher, 'Voucher Status Updated Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(VoucherRequest $request, $id)
    {
        $voucher = $this->voucher::findOrFail($id);
        $voucher->update($request->all());

        return $this->sendResponse($voucher, 'Voucher Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voucher = $this->voucher->findOrFail($id);
        $voucher->delete();

        return $this->sendResponse([$voucher], 'Voucher has been deleted');
    }
}
