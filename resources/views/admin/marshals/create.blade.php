<x-layout>
    @include('_header')
    @include('_side-nav')

    <x-containers.main>
        <x-containers.sub-header>
            <span class="font-bold">PERSONNEL</span>
            <x-icon name="right-arrow"/>
            <span class="cursor-pointer font-barlowcondensed underline">Marshals</span>
            <x-icon name="right-arrow"/>
            <span class="cursor-pointer font-barlowcondensed underline">Add</span>
        </x-containers.sub-header>

        <x-containers.content>
            <div class="grid grid-cols-6 px-10 py-5">
                <section id="labels" class="font-barlowcondensed text-slate-700 grid grid-rows-6 gap-3 col-span-2">
                    <div>
                        <label class="flex h-12">Personnel Position</label>

                        @error('position')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="flex h-12">Personnel Title</label>

                        @error('title')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="flex h-12">First name</label>

                        @error('firstname')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="flex h-12">Middle name</label>

                        @error('middlename')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="flex h-12">Last name</label>

                        @error('lastname')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="flex h-12"></label>

                        @error('lastname')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                </section>
                <section x-data="{ show: false }" id="fields" class="grid grid-rows-6 gap-3 col-span-4">
                    <div>
                        <input type="text" name="title" placeholder="Marshal" class="font-varela bg-gray-300 border
                        border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500
                        block p-2.5 w-1/4" disabled>
                    </div>
                    <div>
                        <input type="text" name="title" placeholder="Dr., Prof., Mr., Mrs." class="font-varela bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 w-1/4 @error('title') ring-red-500 border-red-500 @enderror" form="create-personnel" value="{{ old('title') }}">
                    </div>
                    <div>
                        <input type="text" name="firstname" placeholder="ex. John" class="font-varela bg-gray-50
                        border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500
                        focus:border-blue-500 block p-2.5 outline-orange-500 w-1/3 @error('firstname') ring-red-500
                        border-red-500 @enderror" form="create-personnel" value="{{ old('firstname') }}" required>
                    </div>
                    <div>
                        <input type="text" name="middlename" placeholder="ex. Smith" class="font-varela bg-gray-50
                        border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500
                        focus:border-blue-500 block p-2.5 outline-orange-500 w-1/3 @error('middlename') ring-red-500
                        border-red-500 @enderror" form="create-personnel" value="{{ old('middlename') }}" required>
                    </div>
                    <div>
                        <input type="text" name="lastname" placeholder="ex. Doe" class="font-varela bg-gray-50 border
                         border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500
                         block p-2.5 outline-orange-500 w-1/3 @error('lastname') ring-red-500 border-red-500
                         @enderror" form="create-personnel" value="{{ old('lastname') }}" required>
                    </div>
                    <div class="flex items-center mb-4">
                        <input type="checkbox" name="is_default" value="{{ true }}" form="create-personnel"
                               class="w-4 h-4
                        text-blue-600
                        bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-slate-700
                        dark:text-gray-300 font-barlow">Set Default</label>
                    </div>

                    <button type="submit" class="grid justify-center text-white bg-blue-500 hover:bg-blue-800
                    focus:outline-none
                    focus:ring-4
                 focus:ring-blue-300 font-semibold font-barlow rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2
                  w-1/3" form="create-personnel">Submit</button>
                </section>


            </div>
        </x-containers.content>

        <form action="{{ route('admin.personnel.marshals.store') }}" method="POST" style="display:none;"
              id="create-personnel">
            @csrf
        </form>
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
