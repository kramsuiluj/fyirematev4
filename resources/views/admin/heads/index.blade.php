<x-layout>
    @include('_header')
    @include('_side-nav')

    <x-containers.main>
        <x-containers.sub-header>
            <span class="font-bold">PERSONNEL</span>
            <x-icon name="right-arrow"/>
            <span class="cursor-pointer font-barlowcondensed underline">View Personnel</span>

            <x-slot name="filter">
                <div class="absolute right-0 -mt-2 mr-4">
                    <div x-data="{ show: false }" class="space-y-2 relative">
                        <input type="hidden" name="position" id="position" value="">

                        <button
                            @click="show = !show"
                            @click.away="show = false"
                            class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none
                        focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1.5 text-center flex justify-between
                        items-center"
                            type="button"
                        >
                        <span id="selected-position">
                            {{ request('filter') ?? 'Filter' }}
                        </span>

                            <x-icon name="dropdown-arrow"/>
                        </button>

                        <!-- Dropdown menu -->
                        <div x-show="show" class="absolute z-10 bg-white rounded divide-y divide-gray-100 shadow
                    mt-2 w-full">
                            <ul class="py-1 text-sm text-gray-700 text-left">
                                <li class="block py-2 px-4 hover:bg-gray-100 cursor-pointer border-b" @click="select">
                                    <a href="{{ route('admin.heads.index') }}">All</a>
                                </li>
                                <li class="block py-2 px-4 hover:bg-gray-100 cursor-pointer border-b" @click="select">
                                    <a href="{{ request()->url() }}?filter=Chief">Chief</a>
                                </li>
                                <li class="block py-2 px-4 hover:bg-gray-100 cursor-pointer" @click="select">
                                    <a href="{{ request()->url() }}?filter=Marshal">Marshal</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </x-slot>
        </x-containers.sub-header>

        <x-containers.content>
            <div class="w-full">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-auto">
                                <table class="min-w-full">
                                    <thead class="bg-white border-b">
                                    <tr class="font-barlow text-slate-700">
                                        <th scope="col" class="text-sm px-6 py-4 text-left">
                                            #
                                        </th>
                                        <th scope="col" class="text-sm px-6 py-4 text-left">
                                            Position
                                        </th>
                                        <th scope="col" class="text-sm px-6 py-4 text-left">
                                            Full Name
                                        </th>
                                        <th scope="col" class="text-sm px-6 py-4 text-left">
                                            Date Created
                                        </th>
                                        <th scope="col" class="text-sm px-6 py-4 text-left">
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($heads as $head)
                                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100
                                    text-left font-barlowcondensed">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-700">
                                                {{ $head->id }}
                                            </td>
                                            <td class="text-sm text-slate-700 px-6 py-4 whitespace-nowrap">
                                                {{ $head->position }}
                                            </td>
                                            <td class="text-sm text-slate-700 px-6 py-4 whitespace-nowrap">
                                                {{ $head->fullname() }}
                                            </td>
                                            <td class="text-sm text-slate-700 px-6 py-4 whitespace-nowrap">
                                                {{ date('F j, Y, g:i a', strtotime($head->created_at)) }}
                                            </td>
                                            <td x-data="{}" class="text-sm text-slate-700 px-6 py-4 whitespace-nowrap
                                            flex space-x-2">
                                                <a id="edit-button" href="{{ route('admin.heads.edit', $head->id) }}" class="text-cyan-700">
                                                    <x-icon name="edit"></x-icon>
                                                </a>
                                                <a id="delete-button" @click.prevent="document.getElementById('delete-{{ $head->id }}').submit()" href="#" class="text-red-700">
                                                    <x-icon name="delete"></x-icon>

                                                    <form id="delete-{{ $head->id }}" action="{{ route('admin.heads.destroy', $head->id) }}" method="POST" style="display: none">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-containers.content>
    </x-containers.main>

    <script>
        const editIcon = document.getElementById('edit-icon');
        const editButton = document.getElementById('edit-button');
        const deleteIcon = document.getElementById('delete-icon');
        const deleteButton = document.getElementById('delete-button');

        editButton.addEventListener('mouseover', () => {
            editIcon.setAttribute('fill', 'currentColor');
        })

        editButton.addEventListener('mouseout', () => {
            editIcon.setAttribute('fill', 'none');
        });

        deleteButton.addEventListener('mouseover', () => {
            deleteIcon.setAttribute('fill', '#FCA5A5');
        })

        deleteButton.addEventListener('mouseout', () => {
           deleteIcon.setAttribute('fill', 'none');
        });
    </script>
</x-layout>
