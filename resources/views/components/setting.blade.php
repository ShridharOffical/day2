@props(['heading'])

<center>
    <section class=" py-8 max-w-4xl mx-auto ">
        <h1 class="text-lg font-bold mb-4" >
            {{ $heading }}
        </h1>
<div class="flex">

    <aside class="w-48">
        <ul>Links <br>
            <a href="/admin/posts/create" class="text-blue-500">New Post</a><br>
            <a href="/admin/posts/" class="text-blue-500">All Post</a>
        </ul>
    </aside>
    <main class="flex-1">
        <x-panel>
            {{ $slot }}
        </x-panel>
    </main>
</div>
    </center>
    
</section>