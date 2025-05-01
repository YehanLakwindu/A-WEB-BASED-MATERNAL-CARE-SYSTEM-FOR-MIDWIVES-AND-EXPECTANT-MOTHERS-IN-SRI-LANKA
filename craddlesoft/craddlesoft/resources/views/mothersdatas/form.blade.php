<div class="space-y-6">
    
    <div>
        <x-input-label for="full_name" :value="__('Full Name')"/>
        <x-text-input 
            id="full_name" 
            name="full_name" 
            type="text" 
            class="block w-full mt-1" 
            :value="old('full_name', $mothersdata?->full_name)" 
            autocomplete="full_name" 
            placeholder="Full Name"/>
        <x-input-error class="mt-2" :messages="$errors->get('full_name')"/>
    </div>
    
    <div>
        <x-input-label for="national_id" :value="__('National Id')"/>
        <x-text-input id="national_id" name="national_id" type="text" class="block w-full mt-1" :value="old('national_id', $mothersdata?->national_id)" autocomplete="national_id" placeholder="National Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('national_id')"/>
    </div>
    <div>
        <x-input-label for="date_of_birth" :value="__('Date Of Birth')" />
        <x-text-input 
            id="date_of_birth" 
            name="date_of_birth" 
            type="date" 
            class="block w-full mt-1" 
            :value="old('date_of_birth', $mothersdata?->date_of_birth ? $mothersdata->date_of_birth->format('Y-m-d') : '')" 
            autocomplete="date_of_birth" 
            placeholder="Date Of Birth" 
        />
        <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
    </div>
    
    <div>
        <x-input-label for="email" :value="__('Email')"/>
        <x-text-input id="email" name="email" type="text" class="block w-full mt-1" :value="old('email', $mothersdata?->email)" autocomplete="email" placeholder="Email"/>
        <x-input-error class="mt-2" :messages="$errors->get('email')"/>
    </div>
    <div>
        <x-input-label for="address" :value="__('Address')"/>
        <x-text-input id="address" name="address" type="text" class="block w-full mt-1" :value="old('address', $mothersdata?->address)" autocomplete="address" placeholder="Address"/>
        <x-input-error class="mt-2" :messages="$errors->get('address')"/>
    </div>
    <div>
        <x-input-label for="nearest_landmark" :value="__('Nearest Landmark')"/>
        <x-text-input id="nearest_landmark" name="nearest_landmark" type="text" class="block w-full mt-1" :value="old('nearest_landmark', $mothersdata?->nearest_landmark)" autocomplete="nearest_landmark" placeholder="Nearest Landmark"/>
        <x-input-error class="mt-2" :messages="$errors->get('nearest_landmark')"/>
    </div>
    <div>
        <x-input-label for="husband_name" :value="__('Husband Name')"/>
        <x-text-input id="husband_name" name="husband_name" type="text" class="block w-full mt-1" :value="old('husband_name', $mothersdata?->husband_name)" autocomplete="husband_name" placeholder="Husband Name"/>
        <x-input-error class="mt-2" :messages="$errors->get('husband_name')"/>
    </div>
    <div>
        <x-input-label for="husband_contact" :value="__('Husband Contact')"/>
        <x-text-input 
            id="husband_contact" 
            name="husband_contact" 
            type="text" 
            class="block w-full mt-1" 
            :value="old('husband_contact', $mothersdata?->husband_contact)" 
            placeholder="Husband Contact" 
            pattern="^\+94\d{9}$|^0\d{9}$" 
            maxlength="15" 
            title="Enter a valid Sri Lankan phone number (e.g., +94771234567 or 0712345678)" 
            required
        />
        <x-input-error class="mt-2" :messages="$errors->get('husband_contact')"/>
    </div>
    
    <div>
        <x-input-label for="husband_occupation" :value="__('Husband Occupation')"/>
        <x-text-input id="husband_occupation" name="husband_occupation" type="text" class="block w-full mt-1" :value="old('husband_occupation', $mothersdata?->husband_occupation)" autocomplete="husband_occupation" placeholder="Husband Occupation"/>
        <x-input-error class="mt-2" :messages="$errors->get('husband_occupation')"/>
    </div>
    <form id="motherDataForm" method="POST" action="{{ route('mothersdatas.store') }}">
        @csrf
        <!-- Last Menstrual Period -->
        
    <div>
        <x-input-label for="last_menstrual_period" :value="__('Last Menstrual Period')"/>
        <x-text-input 
            id="last_menstrual_period" 
            name="last_menstrual_period" 
            type="date" 
            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
            :value="old('last_menstrual_period', $mothersdata?->last_menstrual_period ? $mothersdata->last_menstrual_period->format('Y-m-d') : '')" 
            autocomplete="last_menstrual_period"
        />
        <x-input-error class="mt-2" :messages="$errors->get('last_menstrual_period')"/>
    </div>
    
    
        <!-- Estimated Delivery Date -->
        <div>
            <x-input-label for="stimated_delivery_date" :value="__('Estimated Delivery Date')"/>
            <x-text-input 
                id="stimated_delivery_date" 
                name="stimated_delivery_date" 
                type="date" 
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                :value="old('stimated_delivery_date', $mothersdata?->stimated_delivery_date ? $mothersdata->estimated_delivery_date->format('Y-m-d') : '')" 
                autocomplete="stimated_delivery_date"
            />
            <x-input-error class="mt-2" :messages="$errors->get('stimated_delivery_date')"/>
        </div>
        
        
   
    <div>
        <x-input-label for="previous_pregnancy_history" :value="__('Previous Pregnancy History')"/>
        <x-text-input id="previous_pregnancy_history" name="previous_pregnancy_history" type="text" class="block w-full mt-1" :value="old('previous_pregnancy_history', $mothersdata?->previous_pregnancy_history)" autocomplete="previous_pregnancy_history" placeholder="Previous Pregnancy History"/>
        <x-input-error class="mt-2" :messages="$errors->get('previous_pregnancy_history')"/>
    </div>
    <div>
        <x-input-label for="known_medical_conditions" :value="__('Known Medical Conditions')"/>
        <x-text-input id="known_medical_conditions" name="known_medical_conditions" type="text" class="block w-full mt-1" :value="old('known_medical_conditions', $mothersdata?->known_medical_conditions)" autocomplete="known_medical_conditions" placeholder="Known Medical Conditions"/>
        <x-input-error class="mt-2" :messages="$errors->get('known_medical_conditions')"/>
    </div>
    <div>
        <x-input-label for="current_health_status" :value="__('Current Health Status')"/>
        <x-text-input id="current_health_status" name="current_health_status" type="text" class="block w-full mt-1" :value="old('current_health_status', $mothersdata?->current_health_status)" autocomplete="current_health_status" placeholder="Current Health Status"/>
        <x-input-error class="mt-2" :messages="$errors->get('current_health_status')"/>
    </div>
    <div>
        <x-input-label for="blood_type" :value="__('Blood Type')"/>
        <select id="blood_type" name="blood_type" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <option value="" disabled {{ !$mothersdata?->blood_type ? 'selected' : '' }}>Select Blood Type</option>
            <option value="A+" {{ $mothersdata?->blood_type === 'A+' ? 'selected' : '' }}>A+</option>
            <option value="A-" {{ $mothersdata?->blood_type === 'A-' ? 'selected' : '' }}>A-</option>
            <option value="B+" {{ $mothersdata?->blood_type === 'B+' ? 'selected' : '' }}>B+</option>
            <option value="B-" {{ $mothersdata?->blood_type === 'B-' ? 'selected' : '' }}>B-</option>
            <option value="AB+" {{ $mothersdata?->blood_type === 'AB+' ? 'selected' : '' }}>AB+</option>
            <option value="AB-" {{ $mothersdata?->blood_type === 'AB-' ? 'selected' : '' }}>AB-</option>
            <option value="O+" {{ $mothersdata?->blood_type === 'O+' ? 'selected' : '' }}>O+</option>
            <option value="O-" {{ $mothersdata?->blood_type === 'O-' ? 'selected' : '' }}>O-</option>
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('blood_type')"/>
    </div>
    
    <div>
        <x-input-label for="rh_factor" :value="__('Rh Factor')"/>
        <select id="rh_factor" name="rh_factor" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            <option value="" disabled selected>Select Rh Factor</option>
            <option value="Positive" {{ old('rh_factor', $mothersdata?->rh_factor) === 'Positive' ? 'selected' : '' }}>Positive</option>
            <option value="Negative" {{ old('rh_factor', $mothersdata?->rh_factor) === 'Negative' ? 'selected' : '' }}>Negative</option>
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('rh_factor')"/>
    </div>
    
    <div>
        <x-input-label for="chronic_illnesses" :value="__('Chronic Illnesses')"/>
        <x-text-input id="chronic_illnesses" name="chronic_illnesses" type="text" class="block w-full mt-1" :value="old('chronic_illnesses', $mothersdata?->chronic_illnesses)" autocomplete="chronic_illnesses" placeholder="Chronic Illnesses"/>
        <x-input-error class="mt-2" :messages="$errors->get('chronic_illnesses')"/>
    </div>
    <div>
        <x-input-label for="allergies" :value="__('Allergies')"/>
        <x-text-input id="allergies" name="allergies" type="text" class="block w-full mt-1" :value="old('allergies', $mothersdata?->allergies)" autocomplete="allergies" placeholder="Allergies"/>
        <x-input-error class="mt-2" :messages="$errors->get('allergies')"/>
    </div>
    <div>
        <x-input-label for="previous_surgeries" :value="__('Previous Surgeries')"/>
        <x-text-input id="previous_surgeries" name="previous_surgeries" type="text" class="block w-full mt-1" :value="old('previous_surgeries', $mothersdata?->previous_surgeries)" autocomplete="previous_surgeries" placeholder="Previous Surgeries"/>
        <x-input-error class="mt-2" :messages="$errors->get('previous_surgeries')"/>
    </div>
    <div>
        <x-input-label for="occupation" :value="__('Occupation')"/>
        <x-text-input id="occupation" name="occupation" type="text" class="block w-full mt-1" :value="old('occupation', $mothersdata?->occupation)" autocomplete="occupation" placeholder="Occupation"/>
        <x-input-error class="mt-2" :messages="$errors->get('occupation')"/>
    </div>
    <div>
        <x-input-label for="current_weigh" :value="__('Current Weigh')"/>
        <x-text-input id="current_weigh" name="current_weigh" type="text" class="block w-full mt-1" :value="old('current_weigh', $mothersdata?->current_weigh)" autocomplete="current_weigh" placeholder="Current Weigh"/>
        <x-input-error class="mt-2" :messages="$errors->get('current_weigh')"/>
    </div>
    <div>
        <x-input-label for="mother_contact_number" :value="__('Mother Contact Number')"/>
        <x-text-input id="mother_contact_number" name="mother_contact_number" type="text" class="block w-full mt-1" :value="old('mother_contact_number', $mothersdata?->mother_contact_number)" autocomplete="mother_contact_number" placeholder="Mother Contact Number"/>
        <x-input-error class="mt-2" :messages="$errors->get('mother_contact_number')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>