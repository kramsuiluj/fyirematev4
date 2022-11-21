<x-layout>
    @include('_header')
    @include('_side-nav')

    <x-containers.main>
        <x-containers.sub-header>
            <span class="font-bold">PERSONNEL</span>
            <x-icon name="right-arrow"/>
            <span class="cursor-pointer font-barlowcondensed underline">View Personnel</span>

            <x-slot name="actions">
                <div class="absolute right-0 -mt-2 mr-4">
                    <div x-data="{ show: false }" class="space-y-2 relative">
                        <input type="hidden" name="position" id="position" value="">

                        <div class="flex space-x-2">
                            <a href="{{ route('admin.heads.create') }}" class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none
                        focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1.5 text-center flex justify-between
                        items-center space-x-2">
                                <x-icon name="add"></x-icon>

                                <span>Add Personnel</span>
                            </a>
                        </div>

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
            @if(count($heads) == 0)
                <section class="flex items-center space-x-1 p-2 justify-between">
                    <div class="flex items-center space-x-1 p-2">
                        <div class="text-slate-500 mt-0.5">
                            <x-icon name="info"></x-icon>
                        </div>
                        <p class="text-sm text-slate-500 font-barlow">Currently, there are no personnel in the system.</p>
                    </div>
                </section>
            @else
                    @if (count($heads_filter) == 0 && request('filter') == 'Marshal')
                        <div class="flex items-center space-x-1 p-2">
                            <div class="text-slate-500 mt-0.5">
                                <x-icon name="info"></x-icon>
                            </div>
                            <p class="text-sm text-slate-500 font-barlow">Currently, there are no personnel with <span class="font-semibold">Marshal</span> position in the system.</p>
                        </div>
                    @endif

                    @if (count($heads_filter) == 0 && request('filter') == 'Chief')
                        <div class="flex items-center space-x-1 p-2">
                            <div class="text-slate-500 mt-0.5">
                                <x-icon name="info"></x-icon>
                            </div>
                            <p class="text-sm text-slate-500 font-barlow">Currently, there are no personnel with <span class="font-semibold">Chief</span> position in the system.</p>
                        </div>
                    @endif

                @if (!count($heads_filter) == 0)
                    <div class="w-full">
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 block min-w-full sm:px-6 lg:px-8">
                                    <div class="overflow-auto">
                                        <table class="min-w-full">
                                            <thead class="border-b">
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
                                                    <td x-data="{ show: false }" class="text-sm text-slate-700 px-6 py-4 whitespace-nowrap
                                            flex space-x-2">
                                                        <a id="edit-button" href="{{ route('admin.heads.edit', $head->id) }}" class="text-cyan-700">
                                                            <x-icon name="edit"></x-icon>
                                                        </a>
                                                        <a @click="show = !show" id="delete-button" href="#" class="text-red-700">
                                                            <x-icon name="delete"></x-icon>

                                                            <form id="delete-{{ $head->id }}" action="{{ route('admin.heads.destroy', $head->id) }}" method="POST" style="display: none">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </a>

                                                        <div x-show="show" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                                                            <div class="fixed inset-0 z-10 overflow-y-auto">
                                                                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                                                    <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                                                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                                            <div class="sm:flex sm:items-start">
                                                                                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                                                    <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v3.75m-9.303 3.376C1.83 19.126 2.914 21 4.645 21h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 4.88c-.866-1.501-3.032-1.501-3.898 0L2.697 17.626zM12 17.25h.007v.008H12v-.008z" />
                                                                                    </svg>
                                                                                </div>
                                                                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                                                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Delete personnel</h3>
                                                                                    <div class="mt-2">
                                                                                        <p class="text-sm text-gray-500">Are you sure you want to delete this personnel?</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                                            <button type="button" @click.prevent="document.getElementById('delete-{{ $head->id }}').submit()" class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Delete</button>
                                                                            <button type="button" @click="show = false" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
                @endif
            @endif
        </x-containers.content>
        <div class="w-11/12 mx-auto">
            {{ $heads->links() }}
        </div>
    </x-containers.main>

    @include('_flash')

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
