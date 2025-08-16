<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fund Source') }}
        </h2>
    </x-slot>
    <x-panel class="w-full">
    <div class="m-2">


            <div class="p-2">
            
            
        </div>

        </div>

        <x-splade-table :for="$fundsource" >
            

    
            @cell('action', $item)


                    <ul class="py-3 px-2  inline-flex align-items-center space-x-0.5">
            
                        <li class="items-center">
                            <Link href="{{ route('indexMenu',[ 'programs_id' => $item->id, 'calendar_id' => $item->CALENDARYEAR_ID]) }}" class="px-3 py-1.5 m-1 text-white text-xs font-medium bg-indigo-500 hover:bg-indigo-700 rounded">
                                <span>Proceed</span>
                            </Link>
                        </li>
                    </ul>
     
                    
            @endcell


            @cell('status', $item)

                    @if ($item->FS_DESCRIPTION == "active" || $item->FS_DESCRIPTION == "Active")
                        <span class="text-green-500 text-xs font-medium mr-2 px-2.5 py-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </span>
                    @endif

                    @if ($item->FS_DESCRIPTION == "inactive")
                        <span class=" text-red-500 text-xs font-medium mr-2 px-2.5 py-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                            </svg>
                        </span>
                    @endif


            @endcell



           
        </x-splade-table>
    </x-panel>
</x-app-layout>
