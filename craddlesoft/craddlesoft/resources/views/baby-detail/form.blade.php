<div class="space-y-6">
    
    <div>
        <x-input-label for="mother_id" :value="__('Mother Id')"/>
        <x-text-input id="mother_id" name="mother_id" type="text" class="mt-1 block w-full" :value="old('mother_id', $babyDetail?->mother_id)" autocomplete="mother_id" placeholder="Mother Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('mother_id')"/>
    </div>
    <div>
        <x-input-label for="baby_name" :value="__('Baby Name')"/>
        <x-text-input id="baby_name" name="baby_name" type="text" class="mt-1 block w-full" :value="old('baby_name', $babyDetail?->baby_name)" autocomplete="baby_name" placeholder="Baby Name"/>
        <x-input-error class="mt-2" :messages="$errors->get('baby_name')"/>
    </div>
    <div>
        <x-input-label for="gender" :value="__('Gender')"/>
        <x-text-input id="gender" name="gender" type="text" class="mt-1 block w-full" :value="old('gender', $babyDetail?->gender)" autocomplete="gender" placeholder="Gender"/>
        <x-input-error class="mt-2" :messages="$errors->get('gender')"/>
    </div>
    <div>
        <x-input-label for="date_of_birth" :value="__('Date Of Birth')"/>
        <x-text-input id="date_of_birth" name="date_of_birth" type="text" class="mt-1 block w-full" :value="old('date_of_birth', $babyDetail?->date_of_birth)" autocomplete="date_of_birth" placeholder="Date Of Birth"/>
        <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')"/>
    </div>
    <div>
        <x-input-label for="birth_weight" :value="__('Birth Weight')"/>
        <x-text-input id="birth_weight" name="birth_weight" type="text" class="mt-1 block w-full" :value="old('birth_weight', $babyDetail?->birth_weight)" autocomplete="birth_weight" placeholder="Birth Weight"/>
        <x-input-error class="mt-2" :messages="$errors->get('birth_weight')"/>
    </div>
    <div>
        <x-input-label for="birth_length" :value="__('Birth Length')"/>
        <x-text-input id="birth_length" name="birth_length" type="text" class="mt-1 block w-full" :value="old('birth_length', $babyDetail?->birth_length)" autocomplete="birth_length" placeholder="Birth Length"/>
        <x-input-error class="mt-2" :messages="$errors->get('birth_length')"/>
    </div>
    <div>
        <x-input-label for="blood_type" :value="__('Blood Type')"/>
        <x-text-input id="blood_type" name="blood_type" type="text" class="mt-1 block w-full" :value="old('blood_type', $babyDetail?->blood_type)" autocomplete="blood_type" placeholder="Blood Type"/>
        <x-input-error class="mt-2" :messages="$errors->get('blood_type')"/>
    </div>
    <div>
        <x-input-label for="medical_conditions" :value="__('Medical Conditions')"/>
        <x-text-input id="medical_conditions" name="medical_conditions" type="text" class="mt-1 block w-full" :value="old('medical_conditions', $babyDetail?->medical_conditions)" autocomplete="medical_conditions" placeholder="Medical Conditions"/>
        <x-input-error class="mt-2" :messages="$errors->get('medical_conditions')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>