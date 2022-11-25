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

                <li class="py-3.5 cursor-pointer px-3 {{ request()->routeIs('admin.heads.*') ? 'current-page' : '' }}">
                    <section @click="show = !show" class="flex items-center space-x-2 justify-between">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <a href="{{ route('admin.heads.index') }}">Personnel</a>
                        </div>
                    </section>
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

            <li class="py-1.5 cursor-pointer px-3">
                <section class="flex items-center space-x-2 justify-between">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span>Reports</span>
                    </div>

                    <svg class="w-9 h-9 mt-1 pl-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7"></path></svg>
                </section>
            </li>
        </ul>
    </nav>
</aside>
