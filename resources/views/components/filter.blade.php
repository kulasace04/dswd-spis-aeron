<div class="relative inline-block mr-2 z-10" x-data="{sort:false}">
    <div>
        <button type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="options-menu" aria-haspopup="true" aria-expanded="true" @click="sort = !sort" @click.away="sort = false">
            {{ $label }}: <span class="ml-1"> {{ $sublabel }}</span>
            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    <div class="origin-top-left absolute left-0 w-48 mt-1 rounded-md shadow-lg bg-white" style="display: none;"
        x-show="sort"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95">
        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
            <a href="javascript:void(0)" wire:click="filterData('{{ $typeData }}', '')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">{{ $sortLabel ?? "All" }}</a>
            @foreach($options as $key => $option)
                <a href="javascript:void(0)" wire:key="{{ $key }}" wire:click="filterData('{{ $typeData }}', '{{ $option->id }}')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                    {{ ucfirst($option->name) }}
                </a>
            @endforeach
        </div>
    </div>
</div>