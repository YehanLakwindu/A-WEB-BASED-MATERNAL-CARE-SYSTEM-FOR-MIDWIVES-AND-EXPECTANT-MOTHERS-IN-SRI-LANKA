<div class="space-y-6">
    
    <div>
        <x-input-label for="mother_id" :value="__('Mother Id')"/>
        <x-text-input id="mother_id" name="mother_id" type="text" class="mt-1 block w-full" :value="old('mother_id', $healthChecksAfter9Month?->mother_id)" autocomplete="mother_id" placeholder="Mother Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('mother_id')"/>
    </div>
    <div>
        <x-input-label for="checkup_date" :value="__('Checkup Date')"/>
        <x-text-input id="checkup_date" name="checkup_date" type="text" class="mt-1 block w-full" :value="old('checkup_date', $healthChecksAfter9Month?->checkup_date)" autocomplete="checkup_date" placeholder="Checkup Date"/>
        <x-input-error class="mt-2" :messages="$errors->get('checkup_date')"/>
    </div>
    <div>
        <x-input-label for="weight" :value="__('Weight')"/>
        <x-text-input id="weight" name="weight" type="text" class="mt-1 block w-full" :value="old('weight', $healthChecksAfter9Month?->weight)" autocomplete="weight" placeholder="Weight"/>
        <x-input-error class="mt-2" :messages="$errors->get('weight')"/>
    </div>
    <div>
        <x-input-label for="blood_pressure" :value="__('Blood Pressure')"/>
        <x-text-input id="blood_pressure" name="blood_pressure" type="text" class="mt-1 block w-full" :value="old('blood_pressure', $healthChecksAfter9Month?->blood_pressure)" autocomplete="blood_pressure" placeholder="Blood Pressure"/>
        <x-input-error class="mt-2" :messages="$errors->get('blood_pressure')"/>
    </div>
    <div>
        <x-input-label for="glucose_level" :value="__('Glucose Level')"/>
        <x-text-input id="glucose_level" name="glucose_level" type="text" class="mt-1 block w-full" :value="old('glucose_level', $healthChecksAfter9Month?->glucose_level)" autocomplete="glucose_level" placeholder="Glucose Level"/>
        <x-input-error class="mt-2" :messages="$errors->get('glucose_level')"/>
    </div>
    <div>
        <x-input-label for="hemoglobin_level" :value="__('Hemoglobin Level')"/>
        <x-text-input id="hemoglobin_level" name="hemoglobin_level" type="text" class="mt-1 block w-full" :value="old('hemoglobin_level', $healthChecksAfter9Month?->hemoglobin_level)" autocomplete="hemoglobin_level" placeholder="Hemoglobin Level"/>
        <x-input-error class="mt-2" :messages="$errors->get('hemoglobin_level')"/>
    </div>
    <div>
        <x-input-label for="final_supplements_given" :value="__('Final Supplements Given')"/>
        <x-text-input id="final_supplements_given" name="final_supplements_given" type="text" class="mt-1 block w-full" :value="old('final_supplements_given', $healthChecksAfter9Month?->final_supplements_given)" autocomplete="final_supplements_given" placeholder="Final Supplements Given"/>
        <x-input-error class="mt-2" :messages="$errors->get('final_supplements_given')"/>
    </div>
    <div>
        <x-input-label for="final_health_assessment" :value="__('Final Health Assessment')"/>
        <x-text-input id="final_health_assessment" name="final_health_assessment" type="text" class="mt-1 block w-full" :value="old('final_health_assessment', $healthChecksAfter9Month?->final_health_assessment)" autocomplete="final_health_assessment" placeholder="Final Health Assessment"/>
        <x-input-error class="mt-2" :messages="$errors->get('final_health_assessment')"/>
    </div>
    <div>
        <x-input-label for="urine_test_results" :value="__('Urine Test Results')"/>
        <x-text-input id="urine_test_results" name="urine_test_results" type="text" class="mt-1 block w-full" :value="old('urine_test_results', $healthChecksAfter9Month?->urine_test_results)" autocomplete="urine_test_results" placeholder="Urine Test Results"/>
        <x-input-error class="mt-2" :messages="$errors->get('urine_test_results')"/>
    </div>
    <div>
        <x-input-label for="fetal_position" :value="__('Fetal Position')"/>
        <x-text-input id="fetal_position" name="fetal_position" type="text" class="mt-1 block w-full" :value="old('fetal_position', $healthChecksAfter9Month?->fetal_position)" autocomplete="fetal_position" placeholder="Fetal Position"/>
        <x-input-error class="mt-2" :messages="$errors->get('fetal_position')"/>
    </div>
    <div>
        <x-input-label for="ultrasound_findings" :value="__('Ultrasound Findings')"/>
        <x-text-input id="ultrasound_findings" name="ultrasound_findings" type="text" class="mt-1 block w-full" :value="old('ultrasound_findings', $healthChecksAfter9Month?->ultrasound_findings)" autocomplete="ultrasound_findings" placeholder="Ultrasound Findings"/>
        <x-input-error class="mt-2" :messages="$errors->get('ultrasound_findings')"/>
    </div>
    <div>
        <x-input-label for="risk_of_complications" :value="__('Risk Of Complications')"/>
        <x-text-input id="risk_of_complications" name="risk_of_complications" type="text" class="mt-1 block w-full" :value="old('risk_of_complications', $healthChecksAfter9Month?->risk_of_complications)" autocomplete="risk_of_complications" placeholder="Risk Of Complications"/>
        <x-input-error class="mt-2" :messages="$errors->get('risk_of_complications')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>