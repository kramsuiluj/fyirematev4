<x-layout>
    @include('_header')
    @include('_side-nav')

    <x-containers.main>
        <x-containers.sub-header>
            <span class="font-bold">PERSONNEL</span>
            <x-icon name="right-arrow"/>
            <span class="cursor-pointer font-barlowcondensed underline">View Marshals</span>

            <x-slot name="actions">
                <div class="absolute right-0 -mt-2 mr-4">
                    <div x-data="{ show: false }" class="space-y-2 relative">
                        <input type="hidden" name="position" id="position" value="">

                        <div class="flex space-x-2">
                            <a href="{{ route('admin.personnel.marshals.create') }}" class="text-white bg-blue-500
                            hover:bg-blue-800
                            focus:ring-4 focus:outline-none
                        focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1.5 text-center flex justify-between
                        items-center space-x-2">
                                <x-icon name="add"></x-icon>

                                <span>Add Marshal</span>
                            </a>
                        </div>
                    </div>
                </div>
            </x-slot>
        </x-containers.sub-header>

        <x-containers.content>
            @if(count($marshals) == 0)
                <section class="flex items-center space-x-1 p-2 justify-between">
                    <div class="flex items-center space-x-1 p-2">
                        <div class="text-slate-500 mt-0.5">
                            <x-icon name="info"></x-icon>
                        </div>
                        <p class="text-sm text-slate-500 font-barlow">Currently, there are no personnel in the system.</p>
                    </div>
                </section>
            @else
                {{--                @if (count($heads_filter) == 0 && request('filter') == 'Marshal')--}}
                {{--                    <div class="flex items-center space-x-1 p-2">--}}
                {{--                        <div class="text-slate-500 mt-0.5">--}}
                {{--                            <x-icon name="info"></x-icon>--}}
                {{--                        </div>--}}
                {{--                        <p class="text-sm text-slate-500 font-barlow">Currently, there are no personnel with <span class="font-semibold">Marshal</span> position in the system.</p>--}}
                {{--                    </div>--}}
                {{--                @endif--}}

                {{--                @if (count($heads_filter) == 0 && request('filter') == 'Chief')--}}
                {{--                    <div class="flex items-center space-x-1 p-2">--}}
                {{--                        <div class="text-slate-500 mt-0.5">--}}
                {{--                            <x-icon name="info"></x-icon>--}}
                {{--                        </div>--}}
                {{--                        <p class="text-sm text-slate-500 font-barlow">Currently, there are no personnel with <span class="font-semibold">Chief</span> position in the system.</p>--}}
                {{--                    </div>--}}
                {{--                @endif--}}

                @if (!count($marshals) == 0)
                    <div class="w-full">
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 block min-w-full sm:px-6 lg:px-8">
                                    <div class="overflow-auto">
                                        <table class="min-w-full">
                                            <thead class="border-b">
                                            <tr class="font-barlow text-slate-700">
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
                                                    Default
                                                </th>
                                                <th scope="col" class="text-sm px-6 py-4 text-left">
                                                    Action
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($marshals as $marshal)
                                                <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100
                                    text-left font-barlowcondensed">
                                                    <td class="text-sm text-slate-700 px-6 py-4 whitespace-nowrap">
                                                        Marshals
                                                    </td>
                                                    <td class="text-sm text-slate-700 px-6 py-4 whitespace-nowrap">
                                                        {{ $marshal->fullname() }}
                                                    </td>
                                                    <td class="text-sm text-slate-700 px-6 py-4 whitespace-nowrap">
                                                        {{ date('F j, Y, g:i a', strtotime($marshal->created_at)) }}
                                                    </td>
                                                    <td class="text-sm text-slate-700 px-6 py-4 whitespace-nowrap">


                                                        <form action="{{ route('admin.personnel.marshals.updateDefault', $marshal->id) }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')

                                                            <input type="hidden" name="is_default" value="{{ true }}">

                                                            <button type="{{ $marshal->is_default ? 'button' : 'submit'
                                                            }}" class="{{ $marshal->is_default ? 'default' :
                                                            'not-default' }}">Set
                                                                Default
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td x-data="{ show: false }" class="text-sm text-slate-700 px-6 py-4 whitespace-nowrap
                                            flex space-x-2">
                                                        <a id="edit-button" href="{{ route('admin.personnel.marshals.edit',$marshal->id) }}" class="text-cyan-700">
                                                            <x-icon name="edit"></x-icon>
                                                        </a>

                                                        @if ($marshal->is_default)
                                                            <div x-data="{ show: false }">
                                                                <div class="{{ $marshal->is_default ? 'text-gray-500
                                                            cursor-pointer' :
                                                            'text-red-500'
                                                            }}" @click="show = !show">
                                                                    <x-icon name="delete"></x-icon>
                                                                </div>

                                                                <div x-show="show" class="relative z-10"
                                                                     aria-labelledby="modal-title" role="dialog"
                                                                     aria-modal="true" style="display: none">

                                                                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                                                                    <div class="fixed inset-0 z-10 overflow-y-auto">
                                                                        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

                                                                            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                                                                <div class="absolute right-2 mt-2">
                                                                                    <svg @click="show = false"
                                                                                         class="w-6 h-6 cursor-pointer
                                                                                    text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                                                         xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10
                    14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                                                </div>
                                                                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                                                    <div class="sm:flex sm:items-start">
                                                                                        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full
                        bg-gray-100 sm:mx-0 sm:h-10 sm:w-10">
                                                                                            <!-- Heroicon name: outline/exclamation-triangle -->
                                                                                            <svg class="h-6 w-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0
                             0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v3.75m-9.303 3.376C1.83 19.126 2.914 21 4.645 21h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 4.88c-.866-1.501-3.032-1.501-3.898 0L2.697 17.626zM12 17.25h.007v.008H12v-.008z" />
                                                                                            </svg>
                                                                                        </div>
                                                                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                                                            <h3 class="text-lg font-medium leading-6 text-gray-900 border-b pb-1"
                                                                                                id="modal-title">Delete
                                                                                                Personnel</h3>
                                                                                            <div class="mt-2 pb-4">
                                                                                                <p class="text-sm
                                                                                                text-gray-500
                                                                                                whitespace-normal
                                                                                                ">You are not
                                                                                                    allowed to delete a personnel that is
                                                                                                    set to default. Please create another personnel or set another personnel to
                                                                                                    default before deleting this record.</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <a @click="show = !show"
                                                               id="{{ $marshal->is_default ? 'dont-delete' :
                                                               'delete-button'
                                                            }}"
                                                               href="#"
                                                               class="text-red-700">
                                                                <div class="{{ $marshal->is_default ? 'text-gray-500' :
                                                            'text-red-500'
                                                            }}">
                                                                    <x-icon name="delete"></x-icon>
                                                                </div>

                                                                <form id="delete-{{ $marshal->id }}" action="{{ route
                                                                ('admin.personnel.marshals.destroy', $marshal->id) }}"
                                                                      method="POST"
                                                                      style="display:
                                                             none">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            </a>
                                                        @endif
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
            {{ $marshals->links() }}
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
