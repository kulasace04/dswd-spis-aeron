<div class="w-full">
    <label for="input_select_{{ $name }}"  class="block text-sm font-medium @error($name) text-red-600 @else text-gray-600 @enderror font-bold mb-1">{{ $label }}</label>
    <select id="input_select_{{ $name }}" wire:model="{{ $name }}" class="block w-full text-gray-800 border-2 rounded h-10 leading-tight focus:outline-none focus:bg-white focus:border-gray-200
            @error($name)
              border-red-200 focus:border-red-500 focus:ring-red-500
            @else
              border-gray-200 focus:border-blue-500 focus:ring-blue-500
            @enderror block w-full sm:text-sm border-gray-300 rounded-md">
        <option value="null">Select {{ $label }}</option>
        @foreach($options as $option)
            <option value="{{ $option->id }}">{{ $option->name }}</option>
        @endforeach

    </select>
    @error($name) <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
</div>
