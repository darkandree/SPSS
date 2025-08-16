<x-splade-modal max-width="7xl">

            <!-- <div class="p-2 mb-2">
            <Link modal href="{{ route('erfaccomplishments.create') }}" class="px-4 py-2 text-white bg-indigo-500 hover:bg-indigo-700 rounded">New Accomplishment</Link>
            &nbsp;
            </div> -->


            <h5 id="drawer-label" class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">List of Verified Parcel(s)</h5>

      

        <x-splade-table :for="$stubs" >
 
        </x-splade-table>

                
</x-splade-modal>
