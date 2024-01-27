<x-layout>

<center>
    <section class="px-0 py-0 max-w-sm mx-auto ">
        <x-panel  >
        <h1 class="text-lg font-bold mb-4" >
            Publish New Post
        </h1>
        <form action="/admin/posts" method="post" enctype="multipart/form-data"  class="bg-white shadow-md rounded px-2 pt-1 pb-8 mb-0">
            @csrf
            <x-forms.input name="title"/>
                <x-forms.input name="slug"/>
                    <x-forms.input name="thumnail" type='file'/>
                        <x-forms.textarea name="excerpt"/>
                            <x-forms.textarea name="body"/>
                                <x-forms.category />
            <x-submit-button >Publish</x-submit-button>
            
        </form>
        </x-panel>
   
</center>
    </section>


</x-layout>
