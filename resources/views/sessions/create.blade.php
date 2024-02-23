<x-layout>

    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Log In !</h1>

            <form method="POST" action="/login" class="mt-10">
                @csrf

                <x-forms.input name="email"/>
                <x-forms.input name="password"/>
                <x-submit-button >Login</x-submit-button>  




            </form>

        </main>
    </section>
</x-layout>
