<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BabyVaccinationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'baby_id' => 'required',
			'vaccine_name' => 'required|string',
			'vaccination_date' => 'required',
			'dose' => 'required|string',
			'milestone' => 'required|string',
			'notes' => 'string',
        ];
    }
}
