<x-guest-layout>
    <x-auth-card>
    <x-splade-form action="{{ route('usercredentials.store') }}" class="space-y-4">
    <x-splade-data default="{ showUserDetails: false}">
        <x-splade-defer url="`/usercredentials/getUserCredential/${form.userlogin}/${form.userloginpassword}`"



        

        @success="(response) => {
                    form.user_id = response.user_id; 
                    form.user_security = response.user_security; 
                    form.section_id = response.section_id; 
                    form.name = response.username;
                    data.showUserDetails = response.showUserDetails;  
                    }"

        @error="(response) => {
                    form.user_id = ''; 
                    form.name = '';
                    data.showUserDetails = '';  
                    }"


        >




            <x-splade-input id="userlogin" type="text" name="userlogin" :label="__('Userlogin')" required autofocus />
            <x-splade-input id="userloginpassword" type="password" name="userloginpassword" :label="__('Password')" required autocomplete="new-password" />

            <div class="flex items-center justify-end">
                <!-- <Link class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </Link> -->

                <button @click.prevent="reload" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 mr-1 rounded" >Verify User Account</button>
            </div>



            <div v-show="data.showUserDetails">

            <x-splade-input class="mb-2" id="user_id" type="text" name="user_id" :label="__('User id')" required disabled />
            <x-splade-input class="mb-2" id="section_id" type="text" name="section_id" :label="__('Section id')" required disabled />
            <x-splade-input class="mb-2" id="user_security" type="text" name="user_security" :label="__('User Security Id')" required disabled />
            <x-splade-input class="mb-2" id="name" type="text" name="name" :label="__('Name')" required autofocus />
            <x-splade-input class="mb-2" id="email" type="email" name="email" :label="__('Email')" required />
            <x-splade-input class="mb-2" id="password" type="password" name="password" :label="__('Password')" required autocomplete="new-password" />
            <x-splade-input class="mb-4" id="password_confirmation" type="password" name="password_confirmation" :label="__('Confirm Password')" required />

            <div class="flex items-center justify-end">

                <x-splade-submit class="ml-4" :label="__('Migrate User Credential')" />
            </div>

            </div>


        </x-splade-defer>
        </x-splade-data>
        </x-splade-form>
    </x-auth-card>
</x-guest-layout>
