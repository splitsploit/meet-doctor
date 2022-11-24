<?php

namespace App\Http\Requests\ConfigPayment;

use App\Models\MasterData\ConfigPayment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConfigPaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // create middleware from kernel at here
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fee' => [
                'required', 'string', 'max:255'
            ],
            'vat' => [
                'required', 'string', 'max:255'
            ]
        ];
    }
}
