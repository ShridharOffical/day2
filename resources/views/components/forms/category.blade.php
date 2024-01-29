<!-- forms/category.blade.php -->
<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="{{ $name }}">
        {{ $label }}
    </label>
    <select name="{{ $name }}" id="{{ $name }}" class="border border-gray-400 p-2 w-full" required>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old($name, $defaultValue) == $category->id ? 'selected' : '' }}>
                {{ ucwords($category->name) }}
            </option>
        @endforeach
    </select>
    <x-forms.errorform name="{{ $name }}" />
</div>