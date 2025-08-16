<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div style="text-align:center">
        @isset($logo)
            {{ $logo }}
        @else
            <Link href="/"> 
                <x-application-logo class="w-px" />
                <h1 class="font-extrabold tracking-wide">RSBSA Management Information System</h1>
                <span class="bg-green-100 text-green-800 text-xs font-bold mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500">Regional Field Office 8</span>

            </Link>
            
        @endisset
    </div>
    <br/>
    <!-- <div class="justify-center text-center">
        <span class="text-base font-bold text-gray-500">RSBSA ENCODER/VALIDATOR</span><br/>
        <span class="text-base font-bold text-gray-500">RSBSA FIELD DATA ASSISTANT</span><br/>
        <span class="text-sm font-medium text-blue-700 underline decoration-sky-500">Monitoring System</span>
</div> -->
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
