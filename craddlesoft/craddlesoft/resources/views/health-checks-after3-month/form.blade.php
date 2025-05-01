<div class="space-y-6">
    
    <div>
        <x-input-label for="mother_id" :value="__('Mother Id')"/>
        <x-text-input id="mother_id" name="mother_id" type="text" class="mt-1 block w-full" :value="old('mother_id', $healthChecksAfter3Month?->mother_id)" autocomplete="mother_id" placeholder="Mother Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('mother_id')"/>
    </div>
    <div>
        <x-input-label for="checkup_date" :value="__('Checkup Date')"/>
        <x-text-input id="checkup_date" name="checkup_date" type="text" class="mt-1 block w-full" :value="old('checkup_date', $healthChecksAfter3Month?->checkup_date)" autocomplete="checkup_date" placeholder="Checkup Date"/>
        <x-input-error class="mt-2" :messages="$errors->get('checkup_date')"/>
    </div>
    <div>
        <x-input-label for="weight" :value="__('Weight')"/>
        <x-text-input id="weight" name="weight" type="text" class="mt-1 block w-full" :value="old('weight', $healthChecksAfter3Month?->weight)" autocomplete="weight" placeholder="Weight"/>
        <x-input-error class="mt-2" :messages="$errors->get('weight')"/>
    </div>
    <div>
        <x-input-label for="blood_pressure" :value="__('Blood Pressure')"/>
        <x-text-input id="blood_pressure" name="blood_pressure" type="text" class="mt-1 block w-full" :value="old('blood_pressure', $healthChecksAfter3Month?->blood_pressure)" autocomplete="blood_pressure" placeholder="Blood Pressure"/>
        <x-input-error class="mt-2" :messages="$errors->get('blood_pressure')"/>
    </div>
    <div>
        <x-input-label for="glucose_level" :value="__('Glucose Level')"/>
        <x-text-input id="glucose_level" name="glucose_level" type="text" class="mt-1 block w-full" :value="old('glucose_level', $healthChecksAfter3Month?->glucose_level)" autocomplete="glucose_level" placeholder="Glucose Level"/>
        <x-input-error class="mt-2" :messages="$errors->get('glucose_level')"/>
    </div>
    <div>
        <x-input-label for="hemoglobin_level" :value="__('Hemoglobin Level')"/>
        <x-text-input id="hemoglobin_level" name="hemoglobin_level" type="text" class="mt-1 block w-full" :value="old('hemoglobin_level', $healthChecksAfter3Month?->hemoglobin_level)" autocomplete="hemoglobin_level" placeholder="Hemoglobin Level"/>
        <x-input-error class="mt-2" :messages="$errors->get('hemoglobin_level')"/>
    </div>
    <div>
        <x-input-label for="notes" :value="__('Notes')"/>
        <x-text-input id="notes" name="notes" type="text" class="mt-1 block w-full" :value="old('notes', $healthChecksAfter3Month?->notes)" autocomplete="notes" placeholder="Notes"/>
        <x-input-error class="mt-2" :messages="$errors->get('notes')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>