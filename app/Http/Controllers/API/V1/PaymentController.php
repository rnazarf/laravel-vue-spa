<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Http\Requests\V1\PaymentRequest;
use App\Models\Payment;
use Illuminate\Http\Request;


class PaymentController extends BaseController
{
    protected $payment;

    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }

    public function index(Request $request)
    {
        $payments = $this->payment;

        if ($request->search) {
            $payments = $payments::where('name', 'like', '%' . $request->search . '%');
        }

        $result = $payments->orderBy('id', 'desc')->paginate(10);

        return $this->sendResponse($result, 'Payment List');
    }

    public function store(PaymentRequest $request)
    {
        $payment = $this->payment::create([
            'name' => $request['name'],
            'description' => $request['description'],
        ]);

        return $this->sendResponse($payment, 'Payment Created Successfully');
    }

    public function update(PaymentRequest $request, $id)
    {
        $payment = $this->payment::findOrFail($id);
        $payment->update($request->all());

        return $this->sendResponse($payment, 'Payment Information has been updated');
    }

    public function destroy($id)
    {
        $payment = $this->payment->findOrFail($id);
        $payment->delete();

        return $this->sendResponse([$payment], 'Payment has been deleted');
    }
}
