<x-app-layout>

    <div class="flex items-center">
        <h3 class="text-2xl font-bold leading-6 text-white px-4 sm:px-0 my-10">Pensioner List</h3>
        <a href="{{ route('pension.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-auto">
            Add New Pensioner
        </a>
    </div>

    @livewire('pension.pension-list')

</x-app-layout>

