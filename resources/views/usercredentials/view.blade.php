<x-splade-modal max-width="7xl" >
    <div class="row justify-content-center ">

        <div id="detail_div_a4">                      
             <embed src="{{ asset('storage/' .$Doc->file_location) }}" type="application/pdf" width="100%" height="900px">
         </div>
   </div>
</x-splade-modal>