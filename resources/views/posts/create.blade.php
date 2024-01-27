<x-layout>

<center>
    <section class="px-0 py-0 max-w-sm mx-auto ">
        <x-panel  >
        <h1 class="text-lg font-bold mb-4" >
            Publish New Post
        </h1>
        <form action="/admin/posts" method="post" enctype="multipart/form-data"  class="bg-white shadow-md rounded px-2 pt-1 pb-8 mb-0">
            @csrf
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                  Title
                </label>
                <input class="border border-gray-400 p-2 w-full " name="title" id="title" value="{{old('title')}}" type="text" placeholder="Title" required>
            
            @error('title')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">
                Slug
                </label>
                <input class="border border-gray-400 p-2 w-full " name="slug" value="{{old('slug')}}" id="slug" type="text" placeholder="slug" required>
            @error('slug')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="thumbnail">
                    thumbnail
                </label>
               <input type="file" class="border border-gray-400 p-2 w-full " name="thumbnail" id="thumbnail" value="{{old('thumbnail')}}" required>
            @error('body')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="Excerpt">
                  Excerpt
                </label>
            <textarea   class="border border-gray-400 p-2 w-full " name="Excerpt" id="Excerpt" value="{{old('Excerpt')}}" type="text" placeholder="Excerpt" required></textarea>
            
            @error('excerpt')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
            </div>
            
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">
                  body
                </label>
                <textarea  class="border border-gray-400 p-2 w-full " name="body" id="body" value="{{old('body')}}" type="text" placeholder="body" required></textarea>
            
            @error('body')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
            </div>
            

            
            
            
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

            
            <x-submit-button >Publish</x-submit-button>
            
        </form>
        </x-panel>
   
</center>
    </section>


</x-layout>
