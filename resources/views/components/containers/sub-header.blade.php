<section class="bg-white -mt-1 px-5 py-4 shadow rounded-bl-lg rounded-br-lg flex items-center justify-between border-b-2 border-gray-700 box-border">
    <h2 class="font-barlow text-slate-700 text-lg flex items-center">
        {{ $slot }}
    </h2>

    {{ $actions ?? '' }}
</section>
