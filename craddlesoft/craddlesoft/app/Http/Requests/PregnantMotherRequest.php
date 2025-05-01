<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PregnantMotherRequest extends FormRequest
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
			'full_name' => 'required|string',
			'national_id' => 'required|string',
			'date_of_birth' => 'required',
			'phone_number' => 'required|string',
			'email' => 'string',
			'address' => 'required|string',
			'nearest_landmark' => 'required|string',
			'husband_name' => 'required|string',
			'husband_contact' => 'required|string',
			'estimated_delivery_date' => 'required',
			'last_menstrual_period' => 'required',
			'previous_pregnancy_history' => 'string',
			'known_medical_conditions' => 'string',
			'current_health_status' => 'required|string',
			'current_medications' => 'string',
			'blood_type' => 'required',
			'rh_factor' => 'required',
			'chronic_illnesses' => 'string',
			'allergies' => 'string',
			'previous_surgeries' => 'string',
			'family_health_history' => 'string',
			'first_visit_date' => 'required',
			'reason_for_visit' => 'required|string',
			'vaccination_history' => 'string',
			'smoking' => 'required',
			'alcohol_use' => 'required',
			'drug_use' => 'required',
			'nutritional_habits' => 'required|string',
			'exercise_routine' => 'required|string',
			'occupation' => 'string',
			'work_conditions' => 'string',
        ];
    }
}
