<x-splade-modal>
    <x-splade-form action="{{ route('rforms.store') }}" max-width="6xl">
        <!--<img v-if="form.attachments" :src="form.$fileAsUrl('attachments')" />-->
       
        <!--
        <x-splade-input name="document_id" :label="__('Document Id:')" />
        @error('document_id')
        <div class="error">
                {{$message}}
        </div>
        @enderror
-->

        <h5 id="drawer-label" class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">RSBSA Forms</h5>

        
        <x-splade-select class="mb-2" name="province_id[]" :options="$province_id" :label="__('Province:')" :placeholder="__('Select Province')" choices required autofocus/>
        @error('province_id[]')
        <div class="error">
                {{$message}}
        </div>
        @enderror

        <x-splade-select class="mb-2" remote-url="`api/municipalities/${form.province_id}`" name="municipality_id[]" option-value="id" option-label="MunCityName" :label="__('Municipality:')" :placeholder="__('Select Municipality')" choices required/>    
        @error('municipality_id[]')
        <div class="error">
                {{$message}}
        </div>
        @enderror

        <x-splade-input class="mb-2" type="number" name="no_forms" :label="__('Number of Forms:')" required/>
        @error('no_forms')
        <div class="error">
                {{$message}}
        </div>
        @enderror

        <x-splade-select class="mb-2" name="receivedfrom_id[]" :options="$receivedfrom_id" :label="__('Receive From:')" choices required/>
        @error('receivedfrom_id[]')
        <div class="error">
                {{$message}}
        </div>
        @enderror

        <x-splade-select class="mb-2" name="storage_id[]" :options="$storage_id" :label="__('Storage:')" choices required/>
        @error('storage_id[]')
        <div class="error">
                {{$message}}
        </div>
        @enderror

        <x-splade-file class="mb-2" name="file_location" :label="__('Transmittal:')" filepond accept="application/pdf" filepond preview required/> <br/>

        @error('file_location')
        <div class="error">
                {{$message}}
        </div>
        @enderror
        <x-splade-submit class="mt-3" :label="__('Add')" />
    </x-splade-form>
</x-splade-modal>