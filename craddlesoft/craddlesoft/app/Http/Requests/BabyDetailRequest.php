<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BabyDetailRequest extends FormRequest
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
			'mother_id' => 'required|string',
			'baby_name' => 'required|string',
			'gender' => 'required|string',
			'date_of_birth' => 'required',
			'birth_weight' => 'required',
			'birth_length' => 'required',
			'blood_type' => 'required|string',
			'medical_conditions' => 'string',
        ];
    }
}
