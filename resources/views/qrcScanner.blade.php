<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('QR Code Scanner') }}
        </h2>
    </x-slot>

    <x-panel class="w-full bg-gray-0">

    <div id="qr-reader" style="width:500px"></div>
    <div id="qr-reader-results"></div>



    <script>
        
    </script>

    </x-panel>



    <x-splade-script>

    function onScanSuccess(decodedText, decodedResult) {
            // Handle the result here
            document.getElementById('qr-reader-results').innerText = decodedText;
            $splade.modal('/modal-content');
            <!--$splade.modal('/modal-content', { modal: true });-->

            
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);



        </x-splade-script>

    
</x-app-layout>
