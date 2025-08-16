
<x-splade-modal class="shadow-2xl" max-width="lg" >


<x-splade-form>

    
            <h5 id="drawer-label" class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">Receive Encoded Forms</h5>
            

            <x-splade-input name="document_id" id="document_id" :label="__('Document Id:')"/>


            <div id="qr-reader" class="max-md"></div>
            <div id="qr-reader-results"></div>

   
</x-splade-form>

<x-splade-script>

    function onScanSuccess(decodedText, decodedResult) {
      // console.log(`Code matched = ${decodedText}`, decodedResult);


      document.getElementById('document_id').value = decodedText;
     
      //  $('#document_id').val(decodedText);

                let id = decodedText;    
                alert(id);    
                alert(decodedText);        

                html5QrcodeScanner.clear().then(_ => {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        url: "{{ route('receiveFormQr') }}",
                        type: 'POST',            
                        data: {
                            _methode: "POST",
                            _token: CSRF_TOKEN, 
                            qr_code : id
                        },            
                        success: function (response) { 
                            console.log(response);
                            if(response.status == 200){
                                alert('berhasil');
                            }else{
                                alert('gagal');
                            }
                            
                        }
                    });   
                    
                }).catch(error => {
                    alert(error);
                });
                
    }

    function onScanFailure(error){

    }


        let html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 10, qrbox: 250 } , false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
        </x-splade-script>


</x-splade-modal>



    

