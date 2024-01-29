@props(['name', 'type'=>'text'])

<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
        {{ $name }}
    </label>
    <input class="border border-gray-400 p-2 w-full" 
           name="{{ $name }}"
           id="{{ $name }}"
           type="{{ $type }}" 
           placeholder="{{ $name }}" 

          {{ $attributes(['value'=>old($name)]) }}
           >
<x-forms.errorform  name={{ $name }}  />
</div>