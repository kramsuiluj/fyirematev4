<aside class="bg-white h-screen fixed top-0 w-44 shadow">
    <nav class="mt-16">
        <ul class="text-slate-700 font-barlowcondensed tracking-wide">
            @can('admin')
                <li
                    class="py-3.5 cursor-pointer flex items-center space-x-2 px-3
                {{ request()->routeIs('dashboard') ? 'current-page' : '' }}
                "
                    id="dashboard"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path></svg>

                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>

                <li x-data="{ show: false }" class="py-3.5 cursor-pointer px-3"
                >
                    <section @click="show = !show" class="flex items-center space-x-2 justify-between">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round"
                                                                          stroke-linejoin="round" stroke-width="1.5"
                                                                          d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            <span>Personnel</span>
                        </div>

                        <div x-show="!show" class="mt-1 text-slate-700">
                            <x-icon name="dropdown-arrow"></x-icon>
                        </div>

                        <div x-show="show" class="mt-1 text-slate-700" style="display: none">
                            <x-icon name="minus"></x-icon>
                        </div>
                    </section>

{{--                    @if (request()->routeIs('admin.personnel.*'))--}}
                        <div x-show="show">
                            <div class="w-full py-2 pl-5 border-b {{ request()->routeIs('admin.personnel.chiefs.*') ?
                             'bg-gray-200' : ''
                            }}">
                                <a href="{{ route('admin.personnel.chiefs.index') }}" class="flex items-center
                                space-x-2">
                                    <x-icon name="personnel"></x-icon>

                                    <span>Chief</span>
                                </a>
                            </div>

                            <div class="w-full py-2 pl-5 {{ request()->routeIs('admin.personnel.marshals.*') ?
                            'bg-gray-200' : '' }}">
                                <a href="{{ route('admin.personnel.marshals.index') }}" class="flex items-center
                                space-x-2">
                                    <x-icon name="personnel"></x-icon>

                                    <span>Marshal</span>
                                </a>
                            </div>
                        </div>
{{--                    @endif--}}
                </li>
                <li class="py-3.5 cursor-pointer px-3 {{ request()->routeIs('admin.users.*') ? 'current-page' : '' }}">
                    <section class="flex items-center space-x-2 justify-between">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <a href="{{ route('admin.users.index') }}">Users</a>
                        </div>
                    </section>
                </li>
                <li class="py-3.5 cursor-pointer px-3 {{ request()->routeIs('admin.activities.*') ? 'current-page' : ''
                }}">
                    <section class="flex items-center space-x-2 justify-between">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <a href="{{ route('admin.activities.index') }}">Activity Logs</a>
                        </div>
                    </section>
                </li>
                <li class="py-3.5 cursor-pointer px-3 {{ request()->routeIs('locations.*') ? 'current-page' : ''
                }}">
                    <section class="flex items-center space-x-2 justify-between">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round"
                                                                          stroke-linejoin="round" stroke-width="1.5"
                                                                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <a href="{{ route('locations.index') }}">Location</a>
                        </div>
                    </section>
                </li>
            @endcan

            @can('basic')
                    <li
                        class="py-3.5 cursor-pointer flex items-center space-x-2 px-3
                {{ request()->routeIs('users.dashboard') ? 'current-page' : '' }}
                "
                        id="dashboard"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path></svg>

                        <a href="{{ route('users.dashboard') }}">Dashboard</a>
                    </li>
            @endcan

            <li class="py-3.5 cursor-pointer px-3 {{ request()->routeIs('certificates.*') ? 'current-page' : '' }}">
                <section class="flex items-center space-x-2 justify-between">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <a href="{{ route('certificates.index') }}">Certificates</a>
                    </div>
                </section>
            </li>

                <li class="py-3.5 cursor-pointer px-3 {{ request()->routeIs('establishments.*') ? 'current-page' : '' }}">
                    <section class="flex items-center space-x-2 justify-between">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            <a href="{{ route('establishments.index') }}">Establishments</a>
                        </div>
                    </section>
                </li>


{{--            <li class="py-1.5 cursor-pointer px-3">--}}
{{--                <section class="flex items-center space-x-2 justify-between">--}}
{{--                    <div class="flex items-center space-x-2">--}}
{{--                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>--}}
{{--                        <span>Reports</span>--}}
{{--                    </div>--}}

{{--                    <svg class="w-9 h-9 mt-1 pl-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7"></path></svg>--}}
{{--                </section>--}}
{{--            </li>--}}
        </ul>
    </nav>
</aside>
