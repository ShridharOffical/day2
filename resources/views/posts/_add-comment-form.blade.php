@auth
    <x-panel>
        <form method="POST" action="/post/{{ $post->slug }}/comments">
            {{-- {{ dd($post->slug)}} --}}

            @csrf
            <header>
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40"
                    class="rounded-xl">
                <h2>Want to Participate?</h2>
            </header>

            <div class="mt-8">
                <textarea name="body" id="" cols="30" rows="5" class="text-sm focus:outline-none focus:ring w-full"
                    placeholder="Quick, thing of something to say !" required></textarea>

            </div>
            @error('body')
                <span class="text-xs text-red-500"> {{ $message }} </span>
            @enderror

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200 pt-6">
               <x-submit-button>Post</x-submit-button>
            </div>
        </form>

    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a> or
        <a href="/login" class="hover:underline">Log in </a>for leave comment


    </p>
@endauth
