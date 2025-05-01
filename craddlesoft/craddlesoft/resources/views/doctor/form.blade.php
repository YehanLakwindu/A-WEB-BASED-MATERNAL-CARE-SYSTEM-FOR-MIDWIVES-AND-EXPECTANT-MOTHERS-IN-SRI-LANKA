<div class="space-y-6">
    
    <div>
        <x-input-label for="full_name" :value="__('Full Name')"/>
        <x-text-input id="full_name" name="full_name" type="text" class="mt-1 block w-full" :value="old('full_name', $doctor?->full_name)" autocomplete="full_name" placeholder="Full Name"/>
        <x-input-error class="mt-2" :messages="$errors->get('full_name')"/>
    </div>
    <div>
        <x-input-label for="date_of_birth" :value="__('Date Of Birth')"/>
        <x-text-input id="date_of_birth" name="date_of_birth" type="text" class="mt-1 block w-full" :value="old('date_of_birth', $doctor?->date_of_birth)" autocomplete="date_of_birth" placeholder="Date Of Birth"/>
        <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')"/>
    </div>
    <div>
        <x-input-label for="gender" :value="__('Gender')"/>
        <x-text-input id="gender" name="gender" type="text" class="mt-1 block w-full" :value="old('gender', $doctor?->gender)" autocomplete="gender" placeholder="Gender"/>
        <x-input-error class="mt-2" :messages="$errors->get('gender')"/>
    </div>
    <div>
        <x-input-label for="contact_number" :value="__('Contact Number')"/>
        <x-text-input id="contact_number" name="contact_number" type="text" class="mt-1 block w-full" :value="old('contact_number', $doctor?->contact_number)" autocomplete="contact_number" placeholder="Contact Number"/>
        <x-input-error class="mt-2" :messages="$errors->get('contact_number')"/>
    </div>
    <div>
        <x-input-label for="email" :value="__('Email')"/>
        <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" :value="old('email', $doctor?->email)" autocomplete="email" placeholder="Email"/>
        <x-input-error class="mt-2" :messages="$errors->get('email')"/>
    </div>
    <div>
        <x-input-label for="medical_registration_number" :value="__('Medical Registration Number')"/>
        <x-text-input id="medical_registration_number" name="medical_registration_number" type="text" class="mt-1 block w-full" :value="old('medical_registration_number', $doctor?->medical_registration_number)" autocomplete="medical_registration_number" placeholder="Medical Registration Number"/>
        <x-input-error class="mt-2" :messages="$errors->get('medical_registration_number')"/>
    </div>
    <div>
        <x-input-label for="specialty" :value="__('Specialty')"/>
        <x-text-input id="specialty" name="specialty" type="text" class="mt-1 block w-full" :value="old('specialty', $doctor?->specialty)" autocomplete="specialty" placeholder="Specialty"/>
        <x-input-error class="mt-2" :messages="$errors->get('specialty')"/>
    </div>
    <div>
        <x-input-label for="years_of_experience" :value="__('Years Of Experience')"/>
        <x-text-input id="years_of_experience" name="years_of_experience" type="text" class="mt-1 block w-full" :value="old('years_of_experience', $doctor?->years_of_experience)" autocomplete="years_of_experience" placeholder="Years Of Experience"/>
        <x-input-error class="mt-2" :messages="$errors->get('years_of_experience')"/>
    </div>
    <div>
        <x-input-label for="work_location" :value="__('Work Location')"/>
        <x-text-input id="work_location" name="work_location" type="text" class="mt-1 block w-full" :value="old('work_location', $doctor?->work_location)" autocomplete="work_location" placeholder="Work Location"/>
        <x-input-error class="mt-2" :messages="$errors->get('work_location')"/>
    </div>
    <div>
        <x-input-label for="address" :value="__('Address')"/>
        <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $doctor?->address)" autocomplete="address" placeholder="Address"/>
        <x-input-error class="mt-2" :messages="$errors->get('address')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>