<div class="space-y-6">
    
 
    <div>
        <x-input-label for="full_name" :value="__('Full Name')"/>
        <x-text-input id="full_name" name="full_name" type="text" class="block w-full mt-1" :value="old('full_name', $midwife?->full_name)" autocomplete="full_name" placeholder="Full Name"/>
        <x-input-error class="mt-2" :messages="$errors->get('full_name')"/>
    </div>
    <div>
        <x-input-label for="email" :value="__('Email')"/>
        <x-text-input id="email" name="email" type="text" class="block w-full mt-1" :value="old('email', $midwife?->email)" autocomplete="email" placeholder="Email"/>
        <x-input-error class="mt-2" :messages="$errors->get('email')"/>
    </div>
    <div>
        <x-input-label for="contact_number" :value="__('Contact Number')"/>
        <x-text-input id="contact_number" name="contact_number" type="text" class="block w-full mt-1" :value="old('contact_number', $midwife?->contact_number)" autocomplete="contact_number" placeholder="Contact Number"/>
        <x-input-error class="mt-2" :messages="$errors->get('contact_number')"/>
    </div>
    <div>
        <x-input-label for="specialty" :value="__('Specialty')"/>
        <x-text-input id="specialty" name="specialty" type="text" class="block w-full mt-1" :value="old('specialty', $midwife?->specialty)" autocomplete="specialty" placeholder="Specialty"/>
        <x-input-error class="mt-2" :messages="$errors->get('specialty')"/>
    </div>
    <div>
        <x-input-label for="years_of_experience" :value="__('Years Of Experience')"/>
        <x-text-input id="years_of_experience" name="years_of_experience" type="text" class="block w-full mt-1" :value="old('years_of_experience', $midwife?->years_of_experience)" autocomplete="years_of_experience" placeholder="Years Of Experience"/>
        <x-input-error class="mt-2" :messages="$errors->get('years_of_experience')"/>
    </div>
    <div>
        <x-input-label for="work_location" :value="__('Work Location')"/>
        <x-text-input id="work_location" name="work_location" type="text" class="block w-full mt-1" :value="old('work_location', $midwife?->work_location)" autocomplete="work_location" placeholder="Work Location"/>
        <x-input-error class="mt-2" :messages="$errors->get('work_location')"/>
    </div>
    <div>
        <x-input-label for="address" :value="__('Address')"/>
        <x-text-input id="address" name="address" type="text" class="block w-full mt-1" :value="old('address', $midwife?->address)" autocomplete="address" placeholder="Address"/>
        <x-input-error class="mt-2" :messages="$errors->get('address')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>