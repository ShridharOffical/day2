@props(['name', 'type' => 'text'])

<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >
        {{ $name }}
    </label>
    <textarea class="border border-gray-400 p-2 w-full" 
              name="{{ $name }}" 
              id="{{ $name }}" 
              type="text" 
              placeholder="{{ $name }}" 
              required>{{ old($name) }}
              {{ $attributes }} 
           {{ $slot ?? old($name) }} </textarea>

           @error($name)
           <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
       @enderror
</div>