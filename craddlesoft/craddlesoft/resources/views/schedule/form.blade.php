<div class="space-y-6">
    
    <div>
        <x-input-label for="midwife_id" :value="__('Midwife Id')"/>
        <x-text-input id="midwife_id" name="midwife_id" type="text" class="mt-1 block w-full" :value="old('midwife_id', $schedule?->midwife_id)" autocomplete="midwife_id" placeholder="Midwife Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('midwife_id')"/>
    </div>
    <div>
        <x-input-label for="mother_id" :value="__('Mother Id')"/>
        <x-text-input id="mother_id" name="mother_id" type="text" class="mt-1 block w-full" :value="old('mother_id', $schedule?->mother_id)" autocomplete="mother_id" placeholder="Mother Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('mother_id')"/>
    </div>
    <div>
        <x-input-label for="schedule_date" :value="__('Schedule Date')"/>
        <x-text-input id="schedule_date" name="schedule_date" type="text" class="mt-1 block w-full" :value="old('schedule_date', $schedule?->schedule_date)" autocomplete="schedule_date" placeholder="Schedule Date"/>
        <x-input-error class="mt-2" :messages="$errors->get('schedule_date')"/>
    </div>
    <div>
        <x-input-label for="start_time" :value="__('Start Time')"/>
        <x-text-input id="start_time" name="start_time" type="text" class="mt-1 block w-full" :value="old('start_time', $schedule?->start_time)" autocomplete="start_time" placeholder="Start Time"/>
        <x-input-error class="mt-2" :messages="$errors->get('start_time')"/>
    </div>
    <div>
        <x-input-label for="end_time" :value="__('End Time')"/>
        <x-text-input id="end_time" name="end_time" type="text" class="mt-1 block w-full" :value="old('end_time', $schedule?->end_time)" autocomplete="end_time" placeholder="End Time"/>
        <x-input-error class="mt-2" :messages="$errors->get('end_time')"/>
    </div>
    <div>
        <x-input-label for="description" :value="__('Description')"/>
        <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $schedule?->description)" autocomplete="description" placeholder="Description"/>
        <x-input-error class="mt-2" :messages="$errors->get('description')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>