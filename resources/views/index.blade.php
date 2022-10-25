<x-layout>
    <main class="w-1/3 mx-auto border bg-white rounded-md mt-40 shadow">
        <section class="w-3/4 mx-auto my-16 space-y-10">
            <header>
                <h2 class="font-silkscreen font-bold text-2xl tracking-widest text-center">
                    <span class="text-orange-500">FYIRE</span><span class="text-blue-900">MATE</span>
                </h2>
            </header>

            <hr>

            <section>
                <form action="{{ route('sessions.store') }}" method="POST">
                    @csrf

                    <x-forms.input name="username" label="Username" placeholder="Username"></x-forms.input>
                    <x-forms.input type="password" name="password" label="Password" placeholder="•••••••••"></x-forms.input>

                    <div class="flex -mt-3 mb-6 space-x-2 items-center">
                        <input
                            type="checkbox"
                            id="default-input"
                            name="remember"
                            class=""
                        >

                        <label
                            for="remember"
                            class="block font-montserrat mb-2 text-xs text-gray-700 mt-1.5"
                        >
                            Remember me
                        </label>
                    </div>

                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none
                    focus:ring-4 focus:ring-blue-300 font-semibold font-montserrat rounded-full text-sm px-5 py-2.5
                    text-center
                    mr-2
                    mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full">Sign In</button>
                </form>
            </section>
        </section>
    </main>
</x-layout>
