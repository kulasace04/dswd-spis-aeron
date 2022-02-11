<x-app-layout>
    <div class="max-w-5xl mx-auto">
    <div class="flex items-center">
        <h3 class="text-2xl font-bold leading-6 text-white px-4 sm:px-0 my-10">Add New Pensioner</h3>
        <a class="text-white ml-auto" href="{{ route('pension.index') }}">Back Pensioner List</a>
    </div>


    @livewire('pension.pension-create')

    </div>
</x-app-layout>

