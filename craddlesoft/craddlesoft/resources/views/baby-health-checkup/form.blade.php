<div class="space-y-6">
    
    <div>
        <x-input-label for="baby_id" :value="__('Baby Id')"/>
        <x-text-input id="baby_id" name="baby_id" type="text" class="mt-1 block w-full" :value="old('baby_id', $babyHealthCheckup?->baby_id)" autocomplete="baby_id" placeholder="Baby Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('baby_id')"/>
    </div>
    <div>
        <x-input-label for="checkup_date" :value="__('Checkup Date')"/>
        <x-text-input id="checkup_date" name="checkup_date" type="text" class="mt-1 block w-full" :value="old('checkup_date', $babyHealthCheckup?->checkup_date)" autocomplete="checkup_date" placeholder="Checkup Date"/>
        <x-input-error class="mt-2" :messages="$errors->get('checkup_date')"/>
    </div>
    <div>
        <x-input-label for="weight" :value="__('Weight')"/>
        <x-text-input id="weight" name="weight" type="text" class="mt-1 block w-full" :value="old('weight', $babyHealthCheckup?->weight)" autocomplete="weight" placeholder="Weight"/>
        <x-input-error class="mt-2" :messages="$errors->get('weight')"/>
    </div>
    <div>
        <x-input-label for="height" :value="__('Height')"/>
        <x-text-input id="height" name="height" type="text" class="mt-1 block w-full" :value="old('height', $babyHealthCheckup?->height)" autocomplete="height" placeholder="Height"/>
        <x-input-error class="mt-2" :messages="$errors->get('height')"/>
    </div>
    <div>
        <x-input-label for="head_circumference" :value="__('Head Circumference')"/>
        <x-text-input id="head_circumference" name="head_circumference" type="text" class="mt-1 block w-full" :value="old('head_circumference', $babyHealthCheckup?->head_circumference)" autocomplete="head_circumference" placeholder="Head Circumference"/>
        <x-input-error class="mt-2" :messages="$errors->get('head_circumference')"/>
    </div>
    <div>
        <x-input-label for="feeding_status" :value="__('Feeding Status')"/>
        <x-text-input id="feeding_status" name="feeding_status" type="text" class="mt-1 block w-full" :value="old('feeding_status', $babyHealthCheckup?->feeding_status)" autocomplete="feeding_status" placeholder="Feeding Status"/>
        <x-input-error class="mt-2" :messages="$errors->get('feeding_status')"/>
    </div>
    <div>
        <x-input-label for="notes" :value="__('Notes')"/>
        <x-text-input id="notes" name="notes" type="text" class="mt-1 block w-full" :value="old('notes', $babyHealthCheckup?->notes)" autocomplete="notes" placeholder="Notes"/>
        <x-input-error class="mt-2" :messages="$errors->get('notes')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>