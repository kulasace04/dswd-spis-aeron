<div class="w-full">
    <label class="@error($name) text-red-600 @else text-gray-600 @enderror block mb-1 font-bold text-sm tracking-wide">{{ $label }}</label>
    <input class="appearance-none border-2 rounded-md w-full h-10 text-gray-800 leading-tight
            @error($name)
              border-red-200 focus:border-red-500 focus:ring-red-500
            @else
              border-gray-200 focus:border-blue-500 focus:ring-blue-500
            @enderror" type="text" wire:model="{{ $name }}">
    @error($name) <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
</div>
