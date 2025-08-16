<x-admin-layout>

    <x-slot name="header">
        {{ __('Users') }}
    </x-slot>


    <x-panel>
        <div class="m-2">
            <div class="p-2">
                <Link modal  href="{{route('admin.users.create')}}" class="m-1 px-3 py-1 text-white bg-blue-400 hover:bg-blue-600 rounded-md">New User</Link>
            </div>
        </div>
        <x-splade-table :for="$users">
            @cell('actions', $item)
            <Link modal href="{{route('admin.users.edit',$item->id)}}" class="m-1 px-3 py-1 text-white bg-orange-400 hover:bg-orange-600 rounded-md">Edit</Link>
            <Link href="{{route('admin.users.edit',$item->id)}}" method="DELETE" class="m-1 px-3 py-1 text-white bg-red-400 hover:bg-red-600 rounded-md">Delete</Link>
            @endcell
        </x-splade-table>
    </x-panel>
</x-admin-layout>