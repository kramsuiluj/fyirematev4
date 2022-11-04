<button
    {{ $attributes(['class' => 'text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none
                        focus:ring-blue-300 rounded-lg text-sm px-4 py-2.5 flex justify-between
                        items-center']) }}
    type="button"
>
    {{ $slot }}
</button>
