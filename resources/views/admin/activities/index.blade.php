<x-layout>
    @include('_header')
    @include('_side-nav')

    <x-containers.main>
        <x-containers.sub-header>
            <span class="font-bold">ACTIVITY LOGS</span>

            <x-slot name="actions"></x-slot>
        </x-containers.sub-header>

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
    </x-containers.main>
</x-layout>
