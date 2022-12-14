@props(['type' => 'text', 'name', 'label', 'placeholder' => '', 'value' => ''])

<div class="mb-6">
    <label
        for="{{ $name }}"
        class="font-varela block mb-2 text-sm font-semibold text-gray-700"
    >
        {{ $label }}
    </label>

    <input
        type="{{ $type }}"
        id="default-input"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        class="font-varela bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500
        focus:border-blue-500 block w-full p-2.5 outline-orange-500"
        value="{{ $value }}"
    >

    @error($name)
        <p class="text-xs text-red-500 absolute font-montserrat mt-1">{{ $message }}</p>
    @enderror
</div>
