<x-layout>
    <main class="w-1/3 m-0 border bg-white rounded-md shadow vertical-center absolute top-1/2 left-1/2">
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

                    <x-forms.input label="Username" name="username" placeholder="Username"/>
                    <x-forms.input label="Password" name="password" placeholder="•••••••••" type="password"/>

                    <div class="flex -mt-3 mb-6 space-x-2 items-center">
                        <input
                            type="checkbox"
                            id="default-input"
                            name="remember"
                            class="cursor-pointer"
                            value="1"
                        >

                        <label
                            for="remember"
                            class="block font-montserrat mb-2 text-xs text-gray-700 mt-1.5"
                        >
                            Remember me
                        </label>
                    </div>

                    <button type="submit" class="text-white bg-blue-900 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-semibold font-montserrat rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 w-full">Sign In</button>
                </form>
            </section>
        </section>
    </main>
</x-layout>
