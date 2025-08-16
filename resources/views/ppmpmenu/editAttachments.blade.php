<x-splade-modal>

    <x-splade-form :default="['images' => $images]" action="{{route('updateAttachments', $document->id)}}" method="PUT" max-width="6xl" >

    <x-splade-file name="images[]" multiple  :label="__('Attachments:')" allowImageEdit="true" filepond accept="image/*" filepond preview /> <br/>
 
    <x-splade-submit value="Update" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"/>&nbsp;

  
    </x-splade-form>
                
</x-splade-modal>

