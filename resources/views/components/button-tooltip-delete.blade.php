@props(['id'])

<button type="submit" data-tooltip-target="{{ $id }}-delete" data-tooltip-style="light"
    class="bg-slate-50 hover:bg-slate-50 focus:ring-4 focus:outline-none focus:ring-bg-slate-50 font-medium rounded-lg text-sm px-2 py-1 text-center dark:bg-slate-50 dark:hover:bg-slate-50 dark:focus:ring-bg-slate-50 shadow"><svg
        class="w-5 h-5 text-red-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
        viewBox="0 0 24 24" onclick="return confirm('Anda Yakin?')">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
    </svg></button>

<div id="{{ $id }}-delete" role="tooltip"
    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
    {{ $slot }}
    <div class="tooltip-arrow" data-popper-arrow></div>
</div>