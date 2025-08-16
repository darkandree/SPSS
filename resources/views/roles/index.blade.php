<x-app-layout>

    <x-slot name="header">
        {{ __('Roles Index') }}
    </x-slot>


    <x-panel>
        <div class="m-2">
            <div class="p-4">
                <Link modal href="{{ route('roles.create') }}" class="px-4 py-2 text-white bg-indigo-500 hover:bg-indigo-700 rounded">New Role</Link>
            </div>
        </div>
        <x-splade-table :for="$roles">
            @cell('actions', $role)
            
            <Link modal href="{{ route('roles.edit', $role) }}" class="px-3 py-2 m-1 text-white bg-green-400 hover:bg-green-700 rounded">Update</Link>
            <Link href="{{ route('roles.destroy', $role) }}" method="DELETE"
            confirm="Delete Role" confirm-text="Are you sure?" confirm-button="Yes" cancel-button="No"
            class="px-3 py-2 m-1 text-white bg-red-400 hover:bg-red-700 rounded">Delete</Link>
            @endcell
        </x-splade-table>
    </x-panel>
</x-app-layout>