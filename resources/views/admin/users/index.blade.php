<x-layout>
    @include('_header')
    @include('_side-nav')

    <x-containers.main>
        <x-containers.sub-header>
            <div class="flex items-center justify-between">
                <span class="font-bold">USERS</span>

                <x-slot name="actions">
                    <a href="{{ route('admin.users.create') }}" class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none
                        focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1.5 text-center flex justify-between
                        items-center space-x-2">
                        <x-icon name="add"></x-icon>

                        <span>Add User</span>
                    </a>
                </x-slot>
            </div>
        </x-containers.sub-header>

        <x-containers.content>
            @if(count($users) == 0)
                <section class="flex items-center space-x-1 p-2 justify-between">
                    <div class="flex items-center space-x-1 p-2">
                        <div class="text-slate-500">
                            <x-icon name="info"></x-icon>
                        </div>
                        <p class="text-sm text-slate-500">Currently, there are no users in the system.</p>
                    </div>
                </section>
            @else
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
                                                Username
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
                                        @foreach($users as $user)
                                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100
                                    text-left font-barlowcondensed">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-700">
                                                {{ $user->id }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-700">
                                                {{ $user->username }}
                                            </td>
                                            <td class="text-sm text-slate-700 px-6 py-4 whitespace-nowrap">
                                                {{ $user->position }}
                                            </td>
                                            <td class="text-sm text-slate-700 px-6 py-4 whitespace-nowrap">
                                                {{ $user->fullname() }}
                                            </td>
                                            <td class="text-sm text-slate-700 px-6 py-4 whitespace-nowrap">
                                                {{ date('F j, Y, g:i a', strtotime($user->created_at)) }}
                                            </td>
                                            <td x-data="{ show: false }" class="text-sm text-slate-700 px-6 py-4 whitespace-nowrap
                                            flex space-x-2">
                                                <a id="edit-button" href="{{ route('admin.users.edit', $user->id) }}" class="text-cyan-700">
                                                    <x-icon name="edit"></x-icon>
                                                </a>
                                                <a id="delete-button" href="#" @click.prevent="show = !show" class="text-red-700">
                                                    <x-icon name="delete"></x-icon>

                                                    <form id="delete-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </a>
                                                <div x-show="show" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                                    <!--
                                                      Background backdrop, show/hide based on modal state.

                                                      Entering: "ease-out duration-300"
                                                        From: "opacity-0"
                                                        To: "opacity-100"
                                                      Leaving: "ease-in duration-200"
                                                        From: "opacity-100"
                                                        To: "opacity-0"
                                                    -->
                                                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                                                    <div class="fixed inset-0 z-10 overflow-y-auto">
                                                        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                                            <!--
                                                              Modal panel, show/hide based on modal state.

                                                              Entering: "ease-out duration-300"
                                                                From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                                To: "opacity-100 translate-y-0 sm:scale-100"
                                                              Leaving: "ease-in duration-200"
                                                                From: "opacity-100 translate-y-0 sm:scale-100"
                                                                To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                            -->
                                                            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                                    <div class="sm:flex sm:items-start">
                                                                        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
{{--                                                                            <!-- Heroicon name: outline/exclamation-triangle -->--}}
                                                                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v3.75m-9.303 3.376C1.83 19.126 2.914 21 4.645 21h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 4.88c-.866-1.501-3.032-1.501-3.898 0L2.697 17.626zM12 17.25h.007v.008H12v-.008z" />
                                                                            </svg>
                                                                        </div>
                                                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                                            <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Delete account</h3>
                                                                            <div class="mt-2">
                                                                                <p class="text-sm text-gray-500">Are you sure you want to delete this account?</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                                    <button type="button" @click.prevent="document.getElementById('delete-{{ $user->id }}').submit()" class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Delete</button>
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
        </x-containers.content>

    </x-containers.main>

    @include('_flash')
</x-layout>
