<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class BankRequest extends FormRequest
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
        } elseif ($this->isMethod('put')) {
            return $this->updateRules();
        }
    }

    public function createRules(): array
    {
        return [
            'name' => 'required|string|max:191unique:users',
            'description' => 'string|max:191',
            'logo' => 'required|image',
            'account_number' => 'required|string|max:30',
        ];
    }

    public function updateRules(): array
    {
        return [
            'name' => 'required|string|max:191unique:users,name,' . $this->id,
            'description' => 'string|max:191',
            'account_number' => 'required|string|max:30',
            'logo' => 'sometimes|nullable|image',
        ];
    }
}
