<x-app-layout>
    <div class="flex items-center">
        <h3 class="text-2xl font-bold leading-6 text-white px-4 sm:px-0 my-10">Pensioner Info</h3>
        <a class="text-white ml-auto" href="{{ route('pension.index') }}">Back Pensioner List</a>
    </div>
    
    <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-white">Update Pensioner Info</h3>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                @livewire('pension.pension-update', ['pension' => $pension ])
            </div>
        </div>
    </div>

    <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>

    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-white">Remove Pensioner</h3>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                @livewire('pension.pension-delete', ['pension' => $pension ])
            </div>
        </div>
    </div>

</x-app-layout>