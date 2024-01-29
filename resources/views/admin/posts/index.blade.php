<x-layout>
    <x-setting heading="Manage Post">

        <div class="container mt-5 p-1">
            <table class="min-w-full divide-y divide-gray-200">
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($posts as $post )
                        
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex item-center">
                                <div class="text-sm font-medium text-gray-900"> 
                                    <a href="/post/{{ $post->slug }}">
                                        {{ $post->title }}</div>
                                    </a>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Published</span>
                            
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="/admin/posts/{{ $post->id }}/edit" class="text-blue-500 hover:text-blue-900">Edit</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            {{-- <a href="/admin/posts/{{ $post->id }}/edit" class="text-blue-500 hover:text-blue-900">Delete</a> --}}
                            <form action="/admin/posts/{{ $post->id }}" method="post" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                    
                    <!-- Add more rows as needed -->
                    @endforeach
                </tbody>
            </table>
        </div>

    </x-setting>
</x-layout>
