<x-splade-modal  max-width="7xl">
    <x-splade-data :default="[
            'jan'=> 0
            ]">
    <x-splade-form :default="[
            'GAA_CODE' => $GAA_CODE,
            'MFOS' => $MFOS,
            'MFO1' => $MFO1,
            'MFO' => $MFO,
            'PROJECT' => $PROJECT,
            'SUBPROJECT' => $SUBPROJECT,
            'OTHERS' => $OTHERS,
            'OTHERS1' => $OTHERS1,

            ]"  action=""  method="POST" class="text-xs" >

            

        <h5 id="drawer-label" class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">ADD DETAILS WITHOUT FIXED PRICE</h5>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <!-- Column 1 -->
    <div class="space-y-2">
        <x-splade-select class="mb-1" name="GAA_CODE[]" :options="$GAA_CODE" :label="__('NEP CODE:')" :placeholder="__('Select')" choices required autofocus/>
        <x-splade-select class="mb-1" name="GAA_CODE[]" :options="$GAA_CODE" :label="__('GAA CODE:')" :placeholder="__('Select')" choices required/>
        <x-splade-select class="mb-1" name="MFOS[]" :options="$MFOS"  :label="__('MFOS:')" :placeholder="__('Select')" choices required/>
        <x-splade-select class="mb-1" remote-url="`http://127.0.0.1:8000/api/ppmpdetailsmfos/${form.MFOS}`" name="MFO1[]" :options="$MFO1" option-value="id" option-label="MFO1" :label="__('MFO1:')" :placeholder="__('Select')" choices required/>
        <x-splade-select class="mb-1" remote-url="`http://127.0.0.1:8000/api/ppmpdetailsmfo1/${form.MFO1}`" name="MFO[]" :options="$MFO" option-value="id" option-label="MFO"  :label="__('MFO:')" :placeholder="__('Select')" choices required/>
        <x-splade-select class="mb-1" remote-url="`http://127.0.0.1:8000/api/ppmpdetailsmfo/${form.MFO}`" name="PROJECT[]" :options="$PROJECT" option-value="id" option-label="PROJECTS" :label="__('PROJECT:')" :placeholder="__('Select')" choices required/>
        <x-splade-select class="mb-1" remote-url="`http://127.0.0.1:8000/api/ppmpdetailsproject/${form.PROJECT}`" name="SUBPROJECT[]" :options="$SUBPROJECT" option-value="id" option-label="SUBPROJECT" :label="__('SUBPROJECT:')" :placeholder="__('Select')" choices/>
        <x-splade-select class="mb-1" remote-url="`http://127.0.0.1:8000/api/ppmpdetailssubproject/${form.SUBPROJECT}`" name="OTHERS[]" :options="$OTHERS" option-value="id" option-label="OTHERS"  :label="__('OTHERS:')" :placeholder="__('Select')" choices/>
        <x-splade-select class="mb-1" remote-url="`http://127.0.0.1:8000/api/ppmpdetailsothers/${form.OTHERS}`" name="OTHERS1[]" :options="$OTHERS1" option-value="id" option-label="OTHERS1" :label="__('SUB OTHERS:')" :placeholder="__('Select')" choices/>
    </div>

    <!-- Column 2 -->
    <div class="space-y-2">
        <x-splade-select class="mb-1" name="GAA_CODE[]" :options="$GAA_CODE" :label="__('CATEGORY:')" :placeholder="__('Select')" choices required autofocus/>
        <x-splade-select class="mb-1" name="GAA_CODE[]" :options="$GAA_CODE" :label="__('SUBCATEGORY:')" :placeholder="__('Select')" choices required autofocus/>
        <x-splade-select class="mb-1" name="GAA_CODE[]" :options="$GAA_CODE" :label="__('STOCKS:')" :placeholder="__('Select')" choices required autofocus/>
        <x-splade-select class="mb-1" name="GAA_CODE[]" :options="$GAA_CODE" :label="__('PPMPCODE:')" :placeholder="__('Select')" choices required autofocus/>
        <x-splade-select class="mb-1" name="GAA_CODE[]" :options="$GAA_CODE" :label="__('UNIT PRICE:')" :placeholder="__('Select')" choices required autofocus/>
        <x-splade-select class="mb-1" name="GAA_CODE[]" :options="$GAA_CODE" :label="__('UOM:')" :placeholder="__('Select')" choices required autofocus/>
        <x-splade-select class="mb-1" name="GAA_CODE[]" :options="$GAA_CODE" :label="__('TYPE:')" :placeholder="__('Select')" choices required autofocus/>
    </div>

    <!-- Column 3 with 2 Sub-Columns -->
    <div class="grid grid-cols-2 gap-4">
        <!-- Sub-column 1: Jan–Jun -->
    <div class="space-y-2">
        <x-splade-input class="mb-1" type="number" name="jan" :label="__('JAN:')" />
        <x-splade-input class="mb-1" type="number" name="feb" :label="__('FEB:')" />
        <x-splade-input class="mb-1" type="number" name="mar" :label="__('MAR:')" />
        <x-splade-input class="mb-1" type="number" name="apr" :label="__('APR:')" />
        <x-splade-input class="mb-1" type="number" name="may" :label="__('MAY:')" />
        <x-splade-input class="mb-1" type="number" name="jun" :label="__('JUN:')" />
        <x-splade-input class="mb-1" type="number" name="jul" :label="__('JUL:')" />
        <x-splade-input class="mb-1" type="number" name="aug" :label="__('AUG:')" />
        <x-splade-input class="mb-1" type="number" name="sep" :label="__('SEP:')" />
        <x-splade-input class="mb-1" type="number" name="oct" :label="__('OCT:')" />
        <x-splade-input class="mb-1" type="number" name="nov" :label="__('NOV:')" />
        <x-splade-input class="mb-1" type="number" name="dec" :label="__('DEC:')" />
    </div>
    

    <div class="space-y-2">
        <x-splade-input class="mb-1" type="number" name="jan" :label="__('AMOUNT')" disabled/>
        <x-splade-input class="mb-1" type="number" name="feb" :label="__('AMOUNT')" disabled/>
        <x-splade-input class="mb-1" type="number" name="mar" :label="__('AMOUNT')" disabled/>
        <x-splade-input class="mb-1" type="number" name="apr" :label="__('AMOUNT')" disabled/>
        <x-splade-input class="mb-1" type="number" name="may" :label="__('AMOUNT')" disabled/>
        <x-splade-input class="mb-1" type="number" name="jun" :label="__('AMOUNT')" disabled/>
        <x-splade-input class="mb-1" type="number" name="jul" :label="__('AMOUNT')" disabled/>
        <x-splade-input class="mb-1" type="number" name="aug" :label="__('AMOUNT')" disabled/>
        <x-splade-input class="mb-1" type="number" name="sep" :label="__('AMOUNT')" disabled/>
        <x-splade-input class="mb-1" type="number" name="oct" :label="__('AMOUNT')" disabled/>
        <x-splade-input class="mb-1" type="number" name="nov" :label="__('AMOUNT')" disabled/>
        <x-splade-input class="mb-1" type="number" name="dec" :label="__('AMOUNT')" disabled/>
    </div>

    <x-splade-input class="mb-1 col-2" type="number" name="dec" :label="__('TOTAL AMOUNT:')" disabled/>
</div>
</div>


  
        <x-splade-submit class="mt-3" :label="__('Save Record')" />
    </x-splade-form>
    </x-splade-data>
</x-splade-modal>