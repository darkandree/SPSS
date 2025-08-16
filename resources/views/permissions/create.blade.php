<x-splade-modal>
    <x-splade-form action="{{ route('permissions.store') }}" >
    <x-splade-input name="name" :label="__('Name:')" :placeholder="__('Name')" required autofocus />
        @error('name')
        <div class="error">
                {{$message}}
        </div>
        @enderror
    <x-splade-select name="roles[]" :options="$roles" :label="__('Roles:')" :placeholder="__('Select Roles')" multiple relation choices />

        <x-splade-submit class="mt-3" :label="__('Add')" />
    </x-splade-form>
</x-splade-modal>