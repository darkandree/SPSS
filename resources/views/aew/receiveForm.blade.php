<x-splade-modal>
    <x-splade-form action="{{route('updateReceiveForm')}}" method="PUT" max-width="6xl">

        <h5 id="drawer-label" class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">Receive Forms</h5>

        <x-splade-select class="mb-2" name="rsbsa_forms[]" :options="$rsbsa_forms" :label="__('RSBSA Forms:')" :placeholder="__('')" choices multiple required autofocus/>
        @error('rsbsa_forms[]')
        <div class="error">
                {{$message}}
        </div>
        @enderror

        <x-splade-submit class="mt-3" :label="__('Save Record')" />

    </x-splade-form>
</x-splade-modal>