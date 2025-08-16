<x-app-layout>

    <x-slot name="header">
        {{ __('Users') }}
    </x-slot>


    <x-panel>
        <div class="m-2">
            <div class="p-4">
                <Link modal href="{{route('users.create')}}" class="px-4 py-2 text-white bg-indigo-500 hover:bg-indigo-700 rounded">New User</Link>
            </div>
        </div>
        <x-splade-table :for="$users">
            @cell('actions', $item)
            
            <Link modal href="{{route('users.edit',$item->id)}}" class="px-3 py-2 m-1 text-white bg-green-400 hover:bg-green-700 rounded">Edit</Link>
            <Link href="{{route('users.destroy',$item->id)}}" method="DELETE" class="px-3  py-2 m-1  text-white bg-red-400 hover:bg-red-700 rounded"
            confirm="Delete User Account" confirm-text="Are you sure?" confirm-button="Yes" cancel-button="No">Delete</Link>

            @endcell
        </x-splade-table>
    </x-panel>
</x-app-layout>