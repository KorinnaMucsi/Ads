<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepositRequest extends FormRequest
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
        return [
            'deposit' => 'required|max:4'
        ];
    }

    public function messages()
{
    return [
        'deposit.required' => 'Please, enter an amount for deposit in rsd.',
        'deposit.max' => 'Can\'t add more than 9999 rsd at once.'
    ];
}
}
