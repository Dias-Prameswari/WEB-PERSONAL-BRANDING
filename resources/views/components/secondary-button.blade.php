<!-- <button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button> -->

<button {{ $attributes->merge([
    'class' =>
    'inline-flex items-center justify-center rounded-full px-4 py-2 font-semibold
     border-2 border-[var(--color-accent)] text-white hover:bg-[color-mix(in_srgb,var(--color-accent)_12%,transparent)]
     focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--color-logo-tta)]'
]) }}>
    {{ $slot }}
</button>
