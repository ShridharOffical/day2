<x-layout>
<x-setting heading="Publish New Post">

    <form action="/admin/posts" method="post" enctype="multipart/form-data"  class="bg-white shadow-md rounded px-2 pt-1 pb-8 mb-0">
        @csrf
        <x-forms.input name="title"/>
        <x-forms.input name="slug"/>
        <x-forms.input name="thumbnail" type='file'/>
        <x-forms.textarea name="excerpt"/>
        <x-forms.textarea name="body"/>
        <x-forms.category />
        <x-submit-button >Publish</x-submit-button>   
    </form>

</x-setting>
</x-layout>
