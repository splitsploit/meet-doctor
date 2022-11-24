<?php

namespace App\Http\Requests\Specialist;

use App\Models\MasterData\Specialist;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Http\FormRequest;

class StoreSpecialistRequest extends FormRequest
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
            'name' => [
                'required', 'string', 'max:255', 'unique:specialist'
            ],
            'price' => [
                'required', 'string', 'max:255'
            ]
        ];
    }
}
