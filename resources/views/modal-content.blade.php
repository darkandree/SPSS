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
        

        <x-splade-file name="file_location" :label="__('Transmittal:')" filepond accept="application/pdf" filepond preview /> <br/>

        @error('file_location')
        <div class="error">
                {{$message}}
        </div>
        @enderror
        <x-splade-submit class="mt-3" :label="__('Add')" />
    </x-splade-form>
</x-splade-modal>