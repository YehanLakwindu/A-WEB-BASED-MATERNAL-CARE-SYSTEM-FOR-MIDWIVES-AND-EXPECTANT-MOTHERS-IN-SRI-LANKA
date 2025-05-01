<div class="space-y-6">
    
    <div>
        <x-input-label for="baby_id" :value="__('Baby Id')"/>
        <x-text-input id="baby_id" name="baby_id" type="text" class="mt-1 block w-full" :value="old('baby_id', $babyVaccination?->baby_id)" autocomplete="baby_id" placeholder="Baby Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('baby_id')"/>
    </div>
    <div>
        <x-input-label for="vaccine_name" :value="__('Vaccine Name')"/>
        <x-text-input id="vaccine_name" name="vaccine_name" type="text" class="mt-1 block w-full" :value="old('vaccine_name', $babyVaccination?->vaccine_name)" autocomplete="vaccine_name" placeholder="Vaccine Name"/>
        <x-input-error class="mt-2" :messages="$errors->get('vaccine_name')"/>
    </div>
    <div>
        <x-input-label for="vaccination_date" :value="__('Vaccination Date')"/>
        <x-text-input id="vaccination_date" name="vaccination_date" type="text" class="mt-1 block w-full" :value="old('vaccination_date', $babyVaccination?->vaccination_date)" autocomplete="vaccination_date" placeholder="Vaccination Date"/>
        <x-input-error class="mt-2" :messages="$errors->get('vaccination_date')"/>
    </div>
    <div>
        <x-input-label for="dose" :value="__('Dose')"/>
        <x-text-input id="dose" name="dose" type="text" class="mt-1 block w-full" :value="old('dose', $babyVaccination?->dose)" autocomplete="dose" placeholder="Dose"/>
        <x-input-error class="mt-2" :messages="$errors->get('dose')"/>
    </div>
    <div>
        <x-input-label for="milestone" :value="__('Milestone')"/>
        <x-text-input id="milestone" name="milestone" type="text" class="mt-1 block w-full" :value="old('milestone', $babyVaccination?->milestone)" autocomplete="milestone" placeholder="Milestone"/>
        <x-input-error class="mt-2" :messages="$errors->get('milestone')"/>
    </div>
    <div>
        <x-input-label for="notes" :value="__('Notes')"/>
        <x-text-input id="notes" name="notes" type="text" class="mt-1 block w-full" :value="old('notes', $babyVaccination?->notes)" autocomplete="notes" placeholder="Notes"/>
        <x-input-error class="mt-2" :messages="$errors->get('notes')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>