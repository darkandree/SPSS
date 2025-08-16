<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <ol class="inline-flex items-center mb-3 space-x-1 md:space-x-2 rtl:space-x-reverse sm:mb-0">
                <li>
                    <div class="flex items-center ">
                        <span class="mx-1 text-sm font-medium text-xs text-gray-500 md:mx-2 dark:text-gray-400 text-sm">Calendar Year</span><span class="bg-gray-200 text-indigo-800 text-xs font-medium me-2 px-2 py-0.5 rounded-md dark:bg-blue-200 dark:text-blue-800 hidden sm:flex">{{$data->CalendarYear}}</span>
                    </div>
                </li>
                    <span class="mx-1 text-gray-400">/</span>
                <li>
                    <div class="flex items-center ">
                        <span class="mx-1 text-sm font-medium text-xs text-gray-500 md:mx-2 dark:text-gray-400 text-sm">Program</span><span class="bg-gray-200 text-indigo-800 text-xs font-medium me-2 px-2 py-0.5 rounded-md dark:bg-blue-200 dark:text-blue-800 hidden sm:flex">{{$data->Programs}}</span>
                    </div>
                </li>
            </ol>
        </h2>
    </x-slot>


    <x-panel class="w-full">
        <div class="m-2">
            <div class="p-2">
                <Link modal href="{{ route('createPPMP',[ 'programs_id' => $programs_id,'calendar_id'=> $calendar_id ]) }}" class="mr-2 px-4 py-2 text-white font-medium bg-indigo-500 hover:bg-indigo-700 rounded">Add PPMP</Link>
            </div>
        </div>

    
        <x-splade-data :default="['programs_id'=> $programs_id, 'calendar_id'=> $calendar_id]">
            <x-splade-form>
                <x-splade-input class="p5-3" name="programs_id" v-model="data.programs_id" :label="__('Program Id:')" v-show="false" />
                <x-splade-input class="p5-3" name="calendar_id" v-model="data.calendar_id" :label="__('Calendar Year Id:')" v-show="false"/>
            </x-splade-form>

        <x-splade-table :for="$ppmp">

            @cell('actions', $item)

                <x-dropdown class="flex items-center w-full text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                

                <x-slot name="trigger">
                    <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                        </svg>
                    </button>
                </x-slot>
                
                <x-slot name="content">
       
                    <Link href="{{ route('indexMenuDetails',[ 'ppmp_id' => $item->id ]) }}"  class="px-4 py-2  m-1 mx-2 text-xs text-gray-500 font-medium hover:bg-gray-200 hover:text-gray-700 rounded flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-blue-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" />
                        </svg>
                            <span>UPDATE</span>
                    </Link>

                    <Link class="px-4 py-2 m-1 mx-2 text-xs text-gray-500 font-medium hover:bg-gray-200 hover:text-gray-700 rounded flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                        </svg>
                            <span>CANCEL</span>
                    </Link>

                    <Link class="px-4 py-2 m-1 mx-2 text-xs text-gray-500 font-medium hover:bg-gray-200 hover:text-gray-700 rounded flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-orange-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
                        </svg>
                            <span>PRINT</span>
                    </Link>

                    <Link  class="px-4 py-2 m-1 mx-2 text-xs text-gray-500 font-medium hover:bg-gray-200 hover:text-gray-700 rounded flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m6.75 7.5 3 2.25-3 2.25m4.5 0h3m-9 8.25h13.5A2.25 2.25 0 0 0 21 18V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v12a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                            <span>NEP - GAA</span>
                    </Link>
                </x-slot>

            </x-dropdown>   

            @endcell


            @cell('status', $item)


       

                @if ($item->PPMP_STATUS == "Open")
                    <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500">OPEN</span>
                @endif


                @if ($item->PPMP_STATUS == "")
                    <span class="bg-orange-100 text-orange-800 text-xs font-medium mr-2 px-2 py-0.5 rounded-md border border-orange-100 dark:bg-gray-700 dark:border-orange-300 dark:text-orange-300">CLOSE</span>
                @endif

                @if ($item->APP_Code == "APP")
                <span class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md border border-purple-100 dark:bg-gray-700 dark:border-purple-500 dark:text-purple-400">APP</span>
                @endif


                


                

                @if ($item->DOCUMENTSTATUS == "Distributed")
                    <span class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md border border-purple-100 dark:bg-gray-700 dark:border-purple-500 dark:text-purple-400">Distributed</span>
                @endif

                @if ($item->DOCUMENTSTATUS == "Encoded")
                    <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500">Encoded</span>
                @endif
            @endcell
           
        </x-splade-table>


        


    </x-splade-data>
        

    </x-panel>
</x-app-layout>
