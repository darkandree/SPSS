<x-splade-modal class="shadow-2xl" >
<div>

<x-splade-form :default="['ca'=> $ca->rsbsa_ca_no,
                                'name'=> $ca->name,
                                'office'=> $ca->office,
                                'position'=> $ca->position,
                                'appeared_at'=> $ca->appeared_at,
                                'purpose'=> $ca->purpose,
                                'assignatory_id'=> $ca->signatory_id
                            ]"  
                             action="{{route('ca.update',$ca->id)}}"  method="PUT" max-width="6xl" >
    


        <h5 id="drawer-label" class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400"><span class="font-extrabold text-orange-500 mr-2">New</span>Certificate of Appearance</h5>
   

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

        <x-splade-textarea class="mb-2" name="appeared_at" :label="__('Appeared at:')" :placeholder="__('No special characters')" required />
        @error('appeared_at')
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

        <x-splade-select class="mb-4" name="assignatory_id[]" :options="$assignatory_id" :label="__('Signatory:')" :placeholder="__('Signatory')" choices required />
            @error('assignatory_id[]')
            <div class="error">
                    {{$message}}
            </div>
            @enderror

        <x-splade-submit class="mt-3" accesskey="u" :label="__('Update ( alt + u )')"  />

    </x-splade-form>


</div>

</x-splade-modal>





