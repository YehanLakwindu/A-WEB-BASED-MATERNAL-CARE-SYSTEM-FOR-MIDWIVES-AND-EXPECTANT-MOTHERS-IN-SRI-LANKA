<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthChecksAfter3MonthRequest extends FormRequest
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
			'checkup_date' => 'required',
			'weight' => 'required|string',
			'blood_pressure' => 'required|string',
			'glucose_level' => 'required|string',
			'hemoglobin_level' => 'required|string',
			'notes' => 'string',
        ];
    }
}
