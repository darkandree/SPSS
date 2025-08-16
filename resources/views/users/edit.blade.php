<x-splade-modal>


    <x-splade-form  :default="[ 'emp_id'=> $user->emp_id,'name'=> $user->name, 'email'=> $user->email, 'roles'=>$userRole, 'permissions'=>$userPermission]"

    action="{{route('users.update',$user)}}" method="PUT">
    
        <!--<x-splade-input name="dbirth" :label="__('Day of Birth:')" date />-->
        <!--<x-splade-input name="dbirth" :label="__('Day of Birth:')" date range/>-->
        <x-splade-input name="emp_id" :label="__('Emp Id:')" disabled/>
        <x-splade-input name="name" :label="__('Name:')" required />
        <x-splade-input name="email" :label="__('Email Address:')" required />
        <x-splade-select name="roles[]" :options="$roles" :label="__('Roles:')" :placeholder="__('Select Roles')" multiple relation choices />
        <x-splade-select name="permissions[]" :options="$permissions" :label="__('Permissions:')" :placeholder="__('Select Permissions')" multiple relation choices />
        <x-splade-submit class="mt-3" :label="__('Update')" />

        

    </x-splade-form>

</x-splade-modal>