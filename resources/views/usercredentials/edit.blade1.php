<x-splade-modal>

    <x-splade-form :default="[  'document_id'=> $document->document_id,
                                'province_id'=> $document->province_id,
                                'municipality_id'=> $document->municipality_id,
                                'no_forms'=> $document->no_forms,
                                'storage_id'=> $document->storage_id,
                                'receivedby_id'=> $document->receivedby_id,
                                'distributedby_id'=> $document->distributedby_id,
                                'encodedby_id'=> $document->encodedby_id,
                                'returnedto_id'=> $document->returnedto_id,
                                'receivedfrom_id' => $document->receivedfrom_id,
                                'date_distributed' => $document->date_distributed,
                                'date_returned' => $document->date_returned
                            ]"  
                             action="{{route('rforms.update',$document->id)}}"  method="PUT" max-width="6xl" >




                @if (($document->receivedby_id != '') AND ($document->distributedby_id != '') AND ($document->returnedto_id != ''))
                    <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500">Encoded</span>
                @endif
                
                @if (($document->receivedby_id != '') AND ($document->distributedby_id == '') AND ($document->returnedto_id == ''))
                    <span class="bg-orange-100 text-orange-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md border border-orange-100 dark:bg-gray-700 dark:border-orange-300 dark:text-orange-300">For Encode</span>
                @endif

                @if (($document->receivedby_id != '') AND ($document->distributedby_id != '') AND ($document->returnedto_id == ''))
                    <span class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md border border-purple-100 dark:bg-gray-700 dark:border-purple-500 dark:text-purple-400">Distributed</span>
                @endif
                
                
        <br/>
        <x-splade-input class="pb-3" name="document_id" :label="__('Document Id:')" disabled/>
        
        <x-splade-select class="pb-3" name="province_id[]" :options="$province_id" :label="__('Province:')" :placeholder="__('Select Province')" choices required/>
        <x-splade-select class="pb-3" name="municipality_id[]" :options="$municipality_id" :label="__('Municipality:')" :placeholder="__('Select Municipality')" choices required/>
        <x-splade-input class="pb-3" name="no_forms" :label="__('No of Forms:')" required/>
        <x-splade-select class="pb-5" name="storage_id[]" :options="$storage_id" :label="__('Storage:')" :placeholder="__('Select Storage')" choices required/>
    

      
    
    <x-splade-toggle>
        <input type="button" class="px-1 py-1 m-0.5 text-xs text-black bg-gray-200 rounded"  v-show="!toggled" @click="setToggle(true)" value="Show More (Routing Details)" /> 
        <input type="button" class="px-1 py-1 m-0.5 text-xs text-white bg-gray-400 rounded"  v-show="toggled" @click="setToggle(false)" value="Show Less (Routing Details)" /> 

        <p class="pb-3" v-show="!toggled">
                
        </p>
            
        <p class="pb-3" v-show="toggled">
            <x-splade-select class="pb-3" name="receivedfrom_id[]" :options="$receivedfrom_id" :label="__('Receive From:')" :placeholder="__('Select Receive From')" choices required/>
            <x-splade-select class="pb-3" name="receivedby_id[]" :options="$receivedby_id" :label="__('Received By:')" :placeholder="__('Select Province')" choices required/>
            <x-splade-select class="pb-3" name="distributedby_id[]" :options="$distributedby_id" :label="__('Distributed By:')" :placeholder="__('Select Municipality')" choices/>   
            <x-splade-input class="pb-3" name="date_distributed" :label="__('Date Distributed:')" date />
            
            <x-splade-select class="pb-3" name="encodedby_id[]" :options="$encodedby_id" :label="__('Encoded By:')" :placeholder="__('Select Encoded By')" choices/>
            
            <x-splade-select class="pb-3" name="returnedto_id[]" :options="$returnedto_id" :label="__('Returned To:')" :placeholder="__('Select Returned To')" choices/>
            <x-splade-input class="p5-3" name="date_returned" :label="__('Date Returned:')" date />
        
        </p>
    
    </x-splade-toggle>
            
    <input type="submit" value="Update" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"/>
    </x-splade-form>

    
            
</x-splade-modal>

