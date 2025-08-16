<x-splade-modal>
    <x-splade-form action="{{ route('roles.store') }}" >
        <x-splade-input name="name" :label="__('Name:')" :placeholder="__('Name')" required autofocus />
        @error('name')
        <div class="error">
                {{$message}}
        </div>
        @enderror
        <x-splade-select name="permissions[]" option-value="name" :options="$permissions" :label="__('Permission:')" :placeholder="__('Select Permissions')" multiple relation choices />
       
        <x-splade-submit class="mt-3" :label="__('Add')" />
    </x-splade-form>
</x-splade-modal>