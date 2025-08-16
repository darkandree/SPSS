<x-splade-modal>
    <x-splade-data
        :default="[
            'PROGRAMS_ID'=> $PROGRAMS_ID,
                ]"  
    
    >

    <x-splade-form 
        :default="[
            'id'=> $data->id,
            'CALENDARYEAR_ID'=> $data->CALENDAR_YEAR1,
            'PROGRAMS_ID'=> $data->PROGRAMS_ID,
            'FUND_ID'=> $data->FUND_ID,
            'DIVISION_ID'=> $data->DIVISION_ID,
            'SECTION_ID'=> $data->SECTION_ID,
            'PREPARED'=> $data->PREPARED,
            'VERIFIED'=> $data->VERIFIED,
            'RECOMMENDED'=> $data->RECOMMENDED,
            'APPROVED'=> $data->APPROVED,
            'PROGRAMFOCAL'=> $data->PROGRAMFOCAL,
            'TOTAL_ALLOCATION'=> $data->TOTAL_ALLOCATION,
            ]" action="{{ route('ppmpdetails.update',$data->id) }}" method="PUT" max-width="6xl">


       
     

        <h5 id="drawer-label" class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">UPDATE PPMP BASIC INFORMATION</h5>

        <x-splade-input class="mb-2" name="CALENDARYEAR_ID"  :label="__('Calendar Year:')" v-show="false" />

        <x-splade-input class="mb-2" name="id"  :label="__('PPMP ID:')" disabled/>
        
        <x-splade-select class="mb-2" name="PROGRAMS_ID[]" :options="$PROGRAMS_ID" :label="__('Programs:')" :placeholder="__('Select')" choices required autofocus/>

        <x-splade-select class="mb-2" remote-url="`http://127.0.0.1:8000/api/ppmpfundsource/${form.PROGRAMS_ID}/${form.CALENDARYEAR_ID}`" name="FUND_ID[]"  option-value="id" option-label="FUNDSOURCE" :label="__('Fund Source:')"  choices required />

        <x-splade-select class="mb-2" name="DIVISION_ID[]" :options="$DIVISION_ID"   :label="__('Division:')" :placeholder="__('Select')" choices required />

        <x-splade-select class="mb-2" remote-url="`http://127.0.0.1:8000/api/ppmpsection/${form.DIVISION_ID}`" name="SECTION_ID"  option-value="id" option-label="Section" :label="__('Section:')" choices required/>

        <x-splade-select class="mb-2" name="PREPARED[]" :options="$PREPARED"   :label="__('Prepared:')" :placeholder="__('Select')" choices required/>

        <x-splade-select class="mb-2" name="VERIFIED[]" :options="$VERIFIED"    :label="__('Verified:')" :placeholder="__('Select')" choices required/>

        <x-splade-select class="mb-2" name="RECOMMENDED[]" :options="$RECOMMENDED"   :label="__('Recommended:')" :placeholder="__('Select')" choices required/>

        <x-splade-select class="mb-2" name="APPROVED[]" :options="$APPROVED"  :label="__('Approved:')" :placeholder="__('Select')" choices required/>

        <x-splade-select class="mb-2" name="PROGRAMFOCAL[]" :options="$PROGRAMFOCAL"   :label="__('Program Focal:')" :placeholder="__('Select')" choices/>

        <x-splade-input class="mb-2" type="number" step="0.01" name="TOTAL_ALLOCATION" :placeholder="__('Amount')"  :label="__('Total Allocation:')" required/>

  
        <x-splade-submit class="mt-3" :label="__('Update Record')" />
    </x-splade-form>
    </x-splade-data>
</x-splade-modal>