<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'name' => 'required|string|max:191|unique:payments,name',
            'description' => 'nullable|max:191',
        ];
    }

    public function updateRules(): array
    {
        return [
            'name' => 'required|string|max:191|unique:payments,name,' . $this->id,
            'description' => 'nullable|max:191',
        ];
    }
}
