<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class VoucherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('post')) {
            return $this->createRules();
        } else {
            return $this->updateRules();
        }
    }

    public function createRules(): array
    {
        return [
            'name' => 'required|string|max:191',
            'description' => 'nullable|string',
            'voucher_code' => 'required|string|max:20|unique:vouchers,voucher_code',
            'status' => 'required|in:Y,N',
            'type_voucher' => 'required|in:Percent,Money',
            'value' => 'required|numeric',
        ];
    }

    public function updateRules(): array
    {
        return [
            'name' => 'required|string|max:191',
            'description' => 'nullable|string',
            'voucher_code' => 'required|string|max:20|unique:vouchers,voucher_code,' . $this->id,
            'status' => 'required|in:Y,N',
            'type_voucher' => 'required|in:Percent,Money',
            'value' => 'required|numeric',
        ];
    }
}
