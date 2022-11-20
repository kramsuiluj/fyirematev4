<aside class="bg-white h-screen fixed top-0 w-44 shadow">
    <nav class="mt-16">
        <ul class="text-slate-700 font-barlowcondensed tracking-wide">
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

{{--                    <svg x-show="show" class="w-9 h-9 mt-1 pl-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>--}}
{{--                    <svg x-show="!show" class="w-9 h-9 mt-1 pl-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7"></path></svg>--}}
                </section>

{{--                <ul x-show="show" class="" id="personnel-actions">--}}
{{--                    <li class="flex items-center space-x-2 justify-between py-1.5 rounded px-2 {{ request()->routeIs('admin.heads.index') ? 'current-page' : '' }}" id="view-personnel">--}}
{{--                        <svg class="w-5 h-5 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>--}}

{{--                        <a href="{{ route('admin.heads.index') }}">View Personnel</a>--}}
{{--                    </li>--}}
{{--                    <li class="flex items-center space-x-2 justify-between py-1.5 rounded px-2 {{ request()->routeIs('admin.heads.create') ? 'current-page' : '' }}" id="add-personnel">--}}
{{--                        <svg class="w-5 h-5 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>--}}

{{--                        <a href="{{ route('admin.heads.create') }}">Add Personnel</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
            <li class="py-3.5 cursor-pointer px-3 {{ request()->routeIs('certificates.*') ? 'current-page' : '' }}">
                <section class="flex items-center space-x-2 justify-between">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <a href="{{ route('certificates.index') }}">Certificates</a>
                    </div>

{{--                    <svg class="w-9 h-9 mt-1 pl-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7"></path></svg>--}}
                </section>
            </li>
            <li class="py-3.5 cursor-pointer px-3 {{ request()->routeIs('admin.users.*') ? 'current-page' : '' }}">
                <section class="flex items-center space-x-2 justify-between">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <a href="{{ route('admin.users.index') }}">Users</a>
                    </div>

{{--                    <svg class="w-9 h-9 mt-1 pl-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7"></path></svg>--}}
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
