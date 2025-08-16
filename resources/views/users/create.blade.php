<x-splade-modal>
    <x-splade-form action="{{ route('users.store') }}" >

        <x-splade-input name="name" :label="__('Name:')" :placeholder="__('Name')" required />
        @error('name')
        <div class="error">
                {{$message}}
        </div>
        @enderror

        <x-splade-input type="email" name="email" :label="__('Email Address:')" :placeholder="__('Email Address')" required />
        @error('email')
        <div class="error">
                {{$message}}
        </div>
        @enderror

        <x-splade-input type="password" name="password" :label="__('Password:')" :placeholder="__('Password')" required />
        @error('password')
        <div class="error">
                {{$message}}
        </div>
        @enderror

        <x-splade-input type="password" autosize name="password_confirmation" :label="__('Password Confirmation:')" :placeholder="__('Password Confirmation')" required />
        @error('password_confirmation')
        <div class="error">
                {{$message}}
        </div>
        @enderror


        <x-splade-select name="roles[]" :options="$roles" :label="__('Roles:')" :placeholder="__('Select Roles')" multiple relation choices />
        @error('roles[]')
        <div class="error">
                {{$message}}
        </div>
        @enderror

        <x-splade-select name="permissions[]" :options="$permissions" :label="__('Permissions:')" :placeholder="__('Select Permissions')" multiple relation choices/>
        @error('permission[]')
        <div class="error">
                {{$message}}
        </div>
        @enderror

        <x-splade-submit class="mt-3" :label="__('Add')" />
    </x-splade-form>
</x-splade-modal>