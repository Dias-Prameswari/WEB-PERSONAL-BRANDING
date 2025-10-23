<!-- <button {{ $attributes->merge(['type' => 'submit', '
    class' => 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button> -->

@props(['type' => 'submit'])
<button
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' =>
        // pill + warna brand (mint/teal)
        'inline-flex items-center justify-center rounded-full px-4 py-2 font-semibold
         text-white bg-[var(--color-accent)] hover:brightness-105
         focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--color-logo-tta)]'
    ]) }}
>
    {{ $slot }}
</button>
