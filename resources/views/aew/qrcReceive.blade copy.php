
<x-splade-modal class="shadow-2xl" max-width="lg" >


<x-splade-form>

    
            <h5 id="drawer-label" class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">Receive Encoded Forms</h5>
            

            <x-splade-input name="document_id" id="document_id" valu="" :label="__('Document Id:')"/>


            <div id="qr-reader" class="max-md"></div>
            <div id="qr-reader-results"></div>

   
</x-splade-form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<x-splade-script>


    function onScanSuccess(decodedText, decodedResult) {


   //   $('#t1').val(decodedText);

      <!-- alert(decodedText); -->

   //  $('#t1').val(decodedText);

   document.getElementById('document_id').value = decodedText;
      
            // Handle the result here
            
            //document.getElementById('qr-reader-results').innerText = decodedText

           // document.getElementById('qr-reader-resultss').textContent = decodedText

            //document.getElementById('emp_id').innerText = decodedText

            //console.log(decodedText);
            
           // data.emp_id = data.decodedText;

            //document.getElementById('emp_id').innerText = decodedText

            //document.querySelector('[x-data]').__x.$data.message = decodedText

            // $splade.modal('/modal-content');  

          // alert("asdfafasfadsfasdfasfa");

          let id = decodeText;

          var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            
          $.ajax({
          url: '{{ route('receiveFormQr') }}',
          type: 'POST',
          data:{
            qr_code : id
          },
          success: function(response) {
             if(response.status == 200){
              alert('Success');
             }
             else{
              alert('Error');
             }
          }
      });

      
    
        }
        

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);


    
        </x-splade-script>


</x-splade-modal>


    

    

