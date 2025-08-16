<x-splade-modal>
     <x-splade-form :default="$role" :action="route('roles.update', $role)" method="PUT">
        
        <x-splade-input name="name" :label="__('Name:')" required autofocus />
        @error('name')
        <div class="error">
                {{$message}}
        </div>
        @enderror
        <x-splade-select name="permissions[]" :options="$permissions" :label="__('Permission:')" :placeholder="__('Select Permissions')"  multiple relation choices />
        <x-splade-submit class="mt-3" :label="__('Update')" />
    </x-splade-form>
</x-splade-modal>

