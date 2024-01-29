<x-layout>
    <x-setting heading="Edite Post --  {{ $post->title }}">






        <form action="/admin/posts/{{ $post->id }}/update" method="post" enctype="multipart/form-data"
            class="bg-white shadow-md rounded px-2 pt-1 pb-8 mb-0">
            @csrf
            @method('PATCH')

            <!-- Title Input -->
            <div class="mb-4">
              
                <x-forms.input name="title" :value="old('title', $post->title)" />
                @error('title')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Slug Input -->
            <div class="mb-4">
                <x-forms.input name="slug" :value="old('slug', $post->slug)" />
                @error('slug')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Thumbnail Input -->
            <div class="mb-4 flex">
                <div class="flex-1">
                    <x-forms.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                    @error('thumbnail')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-6"
                    width="200">
            </div>

            <!-- Excerpt Textarea -->
            <div class="mb-4">
                <x-forms.textarea name="excerpt">{{ old('excerpt', $post->excerpt) }}</x-forms.textarea>
                @error('excerpt')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Body Textarea -->
            <div class="mb-4">
                <x-forms.textarea name="body">{{ old('body', $post->body) }}</x-forms.textarea>
                @error('body')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category Dropdown -->
            @php
                $categories = \App\Models\Category::all();
            @endphp
            <div class="mb-4">
                <select name="category" id="category" class="border border-gray-400 p-2 w-full">
                    <!-- Add options dynamically based on your categories -->
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category', $post->category_id) == $category->id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}
                        </option>
                    @endforeach
                </select>
                @error('category')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <br>
            <br><br>
            <x-submit-button>Update Post</x-submit-button>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </x-setting>
</x-layout>
