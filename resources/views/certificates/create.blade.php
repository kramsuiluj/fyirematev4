<x-layout>
    @include('_header')
    @include('_side-nav')

    <x-containers.main>
        <x-containers.sub-header>
            <span class="font-bold">CERTIFICATES</span>
            <x-icon name="right-arrow"/>
            <span class="cursor-pointer font-barlowcondensed underline">FSIC</span>
        </x-containers.sub-header>

        <x-containers.content>
            <div class="grid grid-cols-6 px-10 py-5">
                <section id="labels" class="font-barlowcondensed text-slate-700 grid grid-rows-14 gap-3 col-span-2">
                    <div>
                        <label class="flex h-12">Date</label>

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
                        <label class="flex h-12">Type of Occupancy</label>

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
                        <label class="flex h-12">Type of Issuance</label>

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
                        <label class="flex h-12">Establishment Name</label>

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
                        <label class="flex h-12">Applicant Name</label>

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
                        <label class="flex h-12">Address</label>

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
                        <label class="flex h-12">Description</label>

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
                        <label class="flex h-12">Valid Until</label>

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
                        <label class="flex h-12">Chief</label>

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
                        <label class="flex h-12">Marshal</label>

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
                        <label class="flex h-12">Amount Paid</label>

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
                        <label class="flex h-12">O.R. Number</label>

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
                        <label class="flex h-12">Payment Date</label>

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

                <section id="fields" class="grid grid-rows-14 gap-3 col-span-4">
                    <div>
                        <input type="date" name="title" placeholder="Dr., Prof., Mr., Mrs." class="font-varela bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 w-1/4 @error('title') ring-red-500 border-red-500 @enderror" form="create-personnel" value="{{ old('title') }}">
                    </div>
                    <div style="" x-data="{ show: false }">
                        <x-dropdown.trigger class="w-1/3 relative" @click="show = !show" @click.away="show = false">
                            <span id="selected-position" class="font-barlow">{{ old('position') ?? 'Select Occupancy' }}</span>

                            <x-icon name="dropdown-arrow"/>

                            <div x-show="show" class="absolute z-10 bg-white rounded shadow top-12 border left-0 w-full font-barlow" style="display: none">
                                <ul class="py-1 text-sm text-gray-700 text-left">
                                    <li class="block py-2 px-4 hover:bg-gray-100 cursor-pointer border-b" @click="select">
                                        Business
                                    </li>
                                    <li class="block py-2 px-4 hover:bg-gray-100 cursor-pointer" @click="select">
                                        Private
                                    </li>
                                </ul>
                            </div>
                        </x-dropdown.trigger>
                    </div>
                    <div style="" x-data="{ show: false }">
                        <x-dropdown.trigger class="w-1/3 relative" @click="show = !show" @click.away="show = false">
                            <span id="selected-position" class="font-barlow">{{ old('position') ?? 'Select Issuance' }}</span>

                            <x-icon name="dropdown-arrow"/>

                            <div x-show="show" class="absolute z-10 bg-white rounded shadow top-12 border left-0 w-full font-barlow" style="display: none">
                                <ul class="py-1 text-sm text-gray-700 text-left">
                                    <li class="block py-2 px-4 hover:bg-gray-100 cursor-pointer border-b" @click="select">
                                        New
                                    </li>
                                    <li class="block py-2 px-4 hover:bg-gray-100 cursor-pointer" @click="select">
                                        Renew
                                    </li>
                                </ul>
                            </div>
                        </x-dropdown.trigger>
                    </div>
                    <div>
                        <input type="text" name="firstname" placeholder="ex. John" class="font-varela bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-orange-500 w-5/6 @error('firstname') ring-red-500 border-red-500 @enderror" form="create-personnel" value="{{ old('firstname') }}" required>
                    </div>
                    <div>
                        <input type="text" name="middlename" placeholder="ex. Smith" class="font-varela bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-orange-500 w-5/6 @error('middlename') ring-red-500 border-red-500 @enderror" form="create-personnel" value="{{ old('middlename') }}" required>
                    </div>
                    <div>
                        <input type="text" name="lastname" placeholder="ex. Doe" class="font-varela bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-orange-500 w-5/6 @error('lastname') ring-red-500 border-red-500 @enderror" form="create-personnel" value="{{ old('lastname') }}" required>
                    </div>
                    <div>
                        <input type="date" name="lastname" placeholder="ex. Doe" class="font-varela bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-orange-500 w-5/6 @error('lastname') ring-red-500 border-red-500 @enderror" form="create-personnel" value="{{ old('lastname') }}" required>
                    </div>
                    <div>
                        <input type="text" name="lastname" placeholder="ex. Doe" class="font-varela bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-orange-500 w-5/6 @error('lastname') ring-red-500 border-red-500 @enderror" form="create-personnel" value="{{ old('lastname') }}" required>
                    </div>
                    <div>
                        <input type="text" name="lastname" placeholder="ex. Doe" class="font-varela bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-orange-500 w-5/6 @error('lastname') ring-red-500 border-red-500 @enderror" form="create-personnel" value="{{ old('lastname') }}" required>
                    </div>
                    <div>
                        <input type="text" name="lastname" placeholder="ex. Doe" class="font-varela bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-orange-500 w-5/6 @error('lastname') ring-red-500 border-red-500 @enderror" form="create-personnel" value="{{ old('lastname') }}" required>
                    </div>
                    <div>
                        <input type="text" name="lastname" placeholder="ex. Doe" class="font-varela bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-orange-500 w-5/6 @error('lastname') ring-red-500 border-red-500 @enderror" form="create-personnel" value="{{ old('lastname') }}" required>
                    </div>
                    <div>
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

        {{--        <section class="bg-white w-1/2 my-5 mx-auto rounded shadow">--}}
        {{--            <form action="{{ route('admin.heads.store') }}" method="POST" class="px-10 py-5">--}}
        {{--                @csrf--}}

        {{--                <div class="flex space-x-5">--}}
        {{--                    <div x-data="{ show: false }" class="space-y-2 w-full relative">--}}
        {{--                        <label for="position" class="font-varela block mb-2 text-sm font-semibold text-gray-700">Position</label>--}}
        {{--                        <input type="hidden" name="position" id="position" value="">--}}

        {{--                        <button--}}
        {{--                            @click="show = !show"--}}
        {{--                            @click.away="show = false"--}}
        {{--                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none--}}
        {{--                        focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center flex justify-between--}}
        {{--                        items-center w-full"--}}
        {{--                            type="button"--}}
        {{--                        >--}}
        {{--                            <span id="selected-position">Select Position</span>--}}

        {{--                            <x-icon name="dropdown-arrow"/>--}}
        {{--                        </button>--}}

        {{--                        <!-- Dropdown menu -->--}}
        {{--                        <div x-show="show" class="absolute z-10 bg-white rounded divide-y divide-gray-100 shadow--}}
        {{--                    mt-2 w-full">--}}
        {{--                            <ul class="py-1 text-sm text-gray-700 text-left">--}}
        {{--                                <li class="block py-2 px-4 hover:bg-gray-100 cursor-pointer border-b" @click="select">--}}
        {{--                                    Chief--}}
        {{--                                </li>--}}
        {{--                                <li class="block py-2 px-4 hover:bg-gray-100 cursor-pointer" @click="select">--}}
        {{--                                    Marshal--}}
        {{--                                </li>--}}
        {{--                            </ul>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}

        {{--                    <x-forms.input name="title" label="Personnel Title" placeholder="ex. Mr., Ms., Dr."></x-forms.input>--}}
        {{--                </div>--}}

        {{--                <x-forms.input name="firstname" label="First name" placeholder="ex. John"></x-forms.input>--}}
        {{--                <x-forms.input name="middlename" label="Middle name" placeholder="ex. Smith"></x-forms.input>--}}
        {{--                <x-forms.input name="lastname" label="Last name" placeholder="ex. Doe"></x-forms.input>--}}

        {{--                <button type="submit" class="text-white bg-blue-900 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-semibold font-montserrat rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 w-full">--}}
        {{--                    Submit--}}
        {{--                </button>--}}

        {{--            </form>--}}
        {{--        </section>--}}
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
