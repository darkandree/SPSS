
<x-splade-modal class="shadow-2xl" max-width="lg" >

<x-splade-form>

    
            <h5 id="drawer-label" class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">Receive Encoded Forms</h5>
            

            <x-splade-input name="document_id" id="document_id" :label="__('Document Id:')"/>


            <div id="qr-reader" class="max-md"></div>
            <div id="qr-reader-results"></div>




</x-splade-form>

<x-splade-script>


function docReady(fn) {
    // see if DOM is already available
    if (document.readyState === "complete" || document.readyState === "interactive") {
        // call on next available tick
        setTimeout(fn, 1);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
} 


docReady(function() {
    var resultContainer = document.getElementById('qr-reader-results');
    var lastResult, countResults = 0;


    let html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 10, qrbox: 250 } , false);
 


    function onScanSuccess(decodedText, decodedResult) {
      // console.log(`Code matched = ${decodedText}`, decodedResult);


      document.getElementById('document_id').value = decodedText;
     
      //  $('#document_id').val(decodedText);

                let id = decodedText;    
                alert(id);

                // Retrieve the CSRF token from a meta tag
var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');



        

// Define the route URL // 
        //s1-start
        var routeUrl = "{{route('receiveFormQr',":id")}}";

        routeUrl = routeUrl.replace(':id',id); 
       
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        // Handle the response here
                        console.log(this.responseText);
                    } else if (this.readyState === 4) {
                        // Handle errors here
                        console.error("Error: " + this.status);
                    }
                };

        xhttp.open("GET", routeUrl, true);
        xhttp.setRequestHeader("X-CSRF-Token", token);  
        xhttp.send();
        //s2-end



    }

    function onScanFailure(error){

    }


    html5QrcodeScanner.render(onScanSuccess, onScanFailure);

});
        
        </x-splade-script>


</x-splade-modal>



    

