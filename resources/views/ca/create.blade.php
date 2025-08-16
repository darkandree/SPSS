
<x-splade-modal class="shadow-2xl" >

<div>
    


  <x-splade-form action="{{ route('ca.store') }}" method="POST" max-width="6xl">

        <h5 id="drawer-label" class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400"><span class="font-extrabold text-lime-700 mr-2">New</span>Certificate of Appearance</h5>
   

        <x-splade-input class="mb-2" name="name" :label="__('Name:')" :placeholder="__('Name')"  required/>
        @error('name')
        <div class="error">
                {{$message}}
        </div>
        @enderror

        <x-splade-textarea class="mb-2" name="office" :label="__('Office:')" :placeholder="__('No special characters')"  />
        @error('office')
        <div class="error">
                {{$message}}
        </div>
        @enderror

        <x-splade-input class="mb-2" name="position" :label="__('Position:')" :placeholder="__('No special characters')"  />
        @error('position')
        <div class="error">
                {{$message}}
        </div>
        @enderror

        <x-splade-textarea class="mb-2" name="appeared" :label="__('Appeared at:')" :placeholder="__('No special characters')" required />
        @error('appeared')
        <div class="error">
                {{$message}}
        </div>
        @enderror

        <x-splade-textarea class="mb-2" name="purpose" :label="__('Purpose:')" :placeholder="__('No special characters')" required />
        @error('purpose')
        <div class="error">
                {{$message}}
        </div>
        @enderror

        <x-splade-select class="mb-4" name="signatory_id[]" :options="$signatory_id" :label="__('Signatory:')" :placeholder="__('Signatory')" choices required />
            @error('signatory_id[]')
            <div class="error">
                    {{$message}}
            </div>
            @enderror


        <x-splade-submit class="mt-3" accesskey="s" :label="__('Save ( alt + s )')"/>

    </x-splade-form>


</div>



</x-splade-modal>


<script setup>





    </script>





