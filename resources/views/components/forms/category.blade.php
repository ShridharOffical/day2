<div class="mb-6 " >
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category">
      category</label>
    <select name="category" id="category">
        
        @php
            $categories= \App\Models\Category::all();
        @endphp

        @foreach ($categories as $category)
        <option value="{{$category->id}}" {{ old('category') == $category->id ? 'selected' : '' }}>
            {{ ucwords($category->name) }}
        </option>
        @endforeach
    </select>
@error('category')
    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
@enderror
</div>