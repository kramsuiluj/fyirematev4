<aside class="bg-white fixed top-0 h-screen left-0 w-40 text-gray-600 bg-white shadow">
    <ul class="mt-20">
        <li class="hover:bg-gray-200 px-5 py-2 text-center border-b
        {{ request()->routeIs('dashboard') ? 'bg-gray-300' : '' }}
        "
        >
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="hover:bg-gray-200 px-5 py-2 text-center
        {{ request()->routeIs('admin.heads.create') ? 'bg-gray-300' : '' }}"
        >
            <a href="{{ route('admin.heads.create') }}">Add Chief/Marshal</a>
        </li>
    </ul>
</aside>
