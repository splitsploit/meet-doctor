<?php

namespace App\Http\Requests\Doctor;

use App\Models\Operational\Doctor;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
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
            'specialist_id' => [
                'required', 'integer'
            ],
            'name' => [
                'required', 'string', 'max:255'
            ],
            'fee' => [
                'required', 'string', 'max:255'
            ],
            'photo' => [
                'nullable', 'string', 'max:10000'
            ]
        ];
    }
}
