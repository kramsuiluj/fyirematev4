<x-layout>
    @include('_header')
    @include('_side-nav')

    <x-containers.main>
        <section class="border-b pb-4 mb-4">
            <h2 class="font-semibold">Add Chief/Marshal</h2>
        </section>

        <section class="w-1/3 mx-auto py-5">
            <form action="{{ route('admin.heads.store') }}" method="POST" class="">
                @csrf

                <div class="flex space-x-5">
                    <div x-data="{ show: false }" class="space-y-2">
                        <label for="position" class="font-varela block mb-2 text-sm font-semibold text-gray-700">Position</label>
                        <input type="hidden" name="position" id="position" value="">

                        <button
                            @click="show = !show"
                            @click.away="show = false"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none
                        focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center flex justify-between
                        items-center w-44"
                            type="button"
                        >
                            <span id="selected-position">Select Position</span>

                            <x-icon name="dropdown-arrow"/>
                        </button>

                        <!-- Dropdown menu -->
                        <div x-show="show" class="absolute z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow
                    mt-2">
                            <ul class="py-1 text-sm text-gray-700 text-center">
                                <li class="block py-2 px-4 hover:bg-gray-100 cursor-pointer border-b">
                                    <span @click="select">Chief</span>
                                </li>
                                <li class="block py-2 px-4 hover:bg-gray-100 cursor-pointer">
                                    <span @click="select">Marshal</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <x-forms.input name="title" label="Personnel Title" placeholder="ex. Mr., Ms., Dr."></x-forms.input>
                </div>

                <x-forms.input name="firstname" label="First name" placeholder="ex. John"></x-forms.input>
                <x-forms.input name="middlename" label="Middle name" placeholder="ex. Smith"></x-forms.input>
                <x-forms.input name="lastname" label="Last name" placeholder="ex. Doe"></x-forms.input>

                <button type="submit" class="text-white bg-blue-900 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-semibold font-montserrat rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 w-full">
                    Submit
                </button>

            </form>
        </section>
    </x-containers.main>

    <script>
        var selected = document.getElementById('selected-position');
        var position = document.getElementById('position');

        function select(e) {
            selected.innerHTML = e.target.innerHTML;
            position.value = selected.innerHTML;
            console.log(position.value);
        }
    </script>
</x-layout>
