@props(['name'])

@if ($name === 'down-arrow')
    <svg {{ $attributes(['class' => 'w-4 h-4']) }} fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3
    .org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
@endif

@if ($name === 'dropdown-arrow')
    <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
@endif