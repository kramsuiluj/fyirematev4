<x-layout>
    @include('_header')
    @include('_side-nav')

    <x-containers.main>
        <x-containers.sub-header>
            <span class="font-bold">PERSONNEL</span>
            <x-icon name="right-arrow"/>
            <span class="cursor-pointer font-barlowcondensed underline">Add Personnel</span>
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
                </section>
                <section x-data="{ show: false }" id="fields" class="grid grid-rows-6 gap-3 col-span-4">
                    <div>
                        <x-dropdown.trigger class="w-1/3 relative" @click="show = !show" @click.away="show = false">
                            <span id="selected-position" class="font-barlow">{{ old('position') ?? 'Select Position' }}</span>

                            <x-icon name="dropdown-arrow"/>

                            <div x-show="show" class="absolute z-10 bg-white rounded shadow top-12 border left-0 w-full font-barlow" style="display: none">
                                <ul class="py-1 text-sm text-gray-700 text-left">
                                    <li class="block py-2 px-4 hover:bg-gray-100 cursor-pointer border-b" @click="select">
                                        Chief
                                    </li>
                                    <li class="block py-2 px-4 hover:bg-gray-100 cursor-pointer" @click="select">
                                        Marshal
                                    </li>
                                </ul>
                            </div>
                        </x-dropdown.trigger>
                    </div>
                    <div>
                        <input type="text" name="title" placeholder="Dr., Prof., Mr., Mrs." class="font-varela bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 w-1/4 @error('title') ring-red-500 border-red-500 @enderror" form="create-personnel" value="{{ old('title') }}">
                    </div>
                    <div>
                        <input type="text" name="firstname" placeholder="ex. John" class="font-varela bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-orange-500 w-5/6 @error('firstname') ring-red-500 border-red-500 @enderror" form="create-personnel" value="{{ old('firstname') }}" required>
                    </div>
                    <div>
                        <input type="text" name="middlename" placeholder="ex. Smith" class="font-varela bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-orange-500 w-5/6 @error('middlename') ring-red-500 border-red-500 @enderror" form="create-personnel" value="{{ old('middlename') }}" required>
                    </div>
                    <div class="border-b">
                        <input type="text" name="lastname" placeholder="ex. Doe" class="font-varela bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-orange-500 w-5/6 @error('lastname') ring-red-500 border-red-500 @enderror" form="create-personnel" value="{{ old('lastname') }}" required>
                    </div>
                    <button type="submit" class="text-white bg-blue-500 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-semibold font-barlow rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 w-1/3" form="create-personnel">Submit</button>
                </section>
            </div>
        </x-containers.content>

        <form action="{{ route('admin.heads.store') }}" method="POST" style="display:none;" id="create-personnel">
            @csrf
            <input type="hidden" name="position" id="position" value="">
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
