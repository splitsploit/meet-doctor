<?php

namespace App\Http\Requests\Consultation;

use App\Models\MasterData\Consultation;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateConsultationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // create middlware from kernel at here
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
                'required', 'string', 'max:255', Rule::unique('consultation')->ignore($this->consultation)
            ]
        ];
    }
}
