<x-app-layout>
        <x-slot name="header">        
        <h2 class="font-semibold text-xl text-gray-500 leading-tight">
            {{ __('Certificate of Appearance') }}
        </h2>
        </x-slot>

        <x-panel class="w-full">
            <div class="m-2">
                <div class="p-2">
                    <Link modal href="{{ route('ca.create') }}" class="px-4 py-2 text-white font-medium bg-indigo-500 hover:bg-indigo-700 rounded">New Certificate</Link>
                </div>
            </div>

            <x-splade-table :for="$ca" >

                @cell('action', $item)

                                <Link modal href="{{route('showCa',$item->id)}}" class="text-xs font-medium mr-2 px-2.5 py-1.5  text-white bg-gray-400 hover:bg-gray-700 rounded">
                                    <span>Print</span>
                                </Link>

                                @if($item->created_at->format('m d Y') >= now()->format('m d Y'))
                                <Link modal href="{{route('CaEdits',[ 'ca' => $item->id])}}" class="text-xs font-medium mr-2 px-2.5 py-1.5  text-white bg-orange-400 hover:bg-orange-700 rounded">
                                    <span>Edit</span>
                                </Link>
                                @endif

                @endcell

            </x-splade-table>

        </x-panel>

</x-app-layout>

