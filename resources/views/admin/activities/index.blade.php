<x-layout>
    @include('_header')
    @include('_side-nav')

    <x-containers.main>
        <x-containers.sub-header>
            <span class="font-bold">ACTIVITY LOGS</span>

            <x-slot name="actions"></x-slot>
        </x-containers.sub-header>

        <x-containers.content>
            <form method="GET" action="">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input name="search" type="search" class="font-barlowcondensed block w-full p-4 pl-10 text-sm
                    text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                    dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
                    <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>
        </x-containers.content>

        <x-containers.content>
            <div class="w-full">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-auto">
                                <table class="min-w-full">
                                    <thead class="border-b">
                                    <tr class="font-barlow text-slate-700">
                                        <th scope="col" class="text-sm px-6 py-4 text-left">
                                            Activity Name
                                        </th>
                                        <th scope="col" class="text-sm px-6 py-4 text-left">
                                            Description
                                        </th>
                                        <th scope="col" class="text-sm px-6 py-4 text-left">
                                            Committed By
                                        </th>
                                        <th scope="col" class="text-sm px-6 py-4 text-left">
                                            Timestamp
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($activities as $activity)
                                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100
                                    text-left font-barlowcondensed">
                                            <td class="text-sm text-slate-700 px-6 py-4 whitespace-nowrap"
                                                style="font-weight: 500">
                                                {{ ucwords($activity->log_name) }}
                                            </td>
                                            <td class="text-sm text-slate-700 px-6 py-4 whitespace-nowrap">
                                                {{ $activity->description }}
                                            </td>
                                            <td class="text-sm text-slate-700 px-6 py-4 whitespace-nowrap">
                                                {{ $activity->causer->fullname() }}
                                            </td>
                                            <td class="text-sm text-slate-700 px-6 py-4 whitespace-nowrap">
                                                {{ date('F j, Y, g:i a', strtotime($activity->created_at)) }}
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

        <div class="w-11/12 mx-auto mb-5">
            {{ $activities->links() }}
        </div>
    </x-containers.main>


</x-layout>
