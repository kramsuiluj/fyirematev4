<x-layout>
    @include('_header')
    @include('_side-nav')

    <x-containers.main>
        <x-containers.sub-header>
            <span class="font-bold">USERS</span>
            <x-icon name="right-arrow"/>
            <span class="cursor-pointer font-barlowcondensed underline">Add User</span>
        </x-containers.sub-header>

        <x-containers.content>
            <div class="grid grid-cols-6 px-10 py-5">
                <section id="labels" class="font-barlowcondensed text-slate-700 grid grid-rows-5 gap-3 col-span-2">
                    <div>
                        <label class="flex h-12">Username</label>

                        @error('username')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="flex h-12">Position</label>

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

                <section x-data="{ show: false }" id="fields" class="grid grid-rows-5 gap-3 col-span-4">
                    <div>
                        <input type="text" name="username" placeholder="Username" class="font-varela bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 w-1/3 @error('username') ring-red-500 border-red-500 @enderror" form="create-user" value="{{ old('username') ?? $user->username }}">
                    </div>
                    <div>
                        <input type="text" name="position" placeholder="ex. Administrative Aide" class="font-varela bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-orange-500 w-5/6 @error('position') ring-red-500 border-red-500 @enderror" form="create-user" value="{{ old('position') ?? $user->position }}" required>
                    </div>
                    <div>
                        <input type="text" name="firstname" placeholder="ex. John" class="font-varela bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-orange-500 w-5/6 @error('firstname') ring-red-500 border-red-500 @enderror" form="create-user" value="{{ old('firstname') ?? $user->firstname }}" required>
                    </div>
                    <div class="">
                        <input type="text" name="middlename" placeholder="ex. Smith" class="font-varela bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-orange-500 w-5/6 @error('middlename') ring-red-500 border-red-500 @enderror" form="create-user" value="{{ old('middlename') ?? $user->middlename }}" required>
                    </div>
                    <div class="">
                        <input type="text" name="lastname" placeholder="ex. Doe" class="font-varela bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-orange-500 w-5/6 @error('lastname') ring-red-500 border-red-500 @enderror" form="create-user" value="{{ old('lastname') ?? $user->lastname }}" required>
                    </div>
                </section>
            </div>

            <div class="flex justify-center pb-5">
                <button type="submit" class="text-white bg-blue-500 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-semibold font-barlow rounded-full text-sm px-5 py-2.5 w-1/3 ml-5" form="create-user">Submit</button>
            </div>

            <form action="{{ route('admin.users.update', $user->id) }}" style="display: none" method="POST" id="create-user">
                @csrf
                @method('PATCH')
            </form>
        </x-containers.content>

    </x-containers.main>

    <script>

    </script>
</x-layout>
