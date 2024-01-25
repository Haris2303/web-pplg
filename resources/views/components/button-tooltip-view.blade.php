@props(['id', 'dataid'])

<button data-tooltip-target="{{ $id }}-view" data-tooltip-style="light" data-modal-target="default-modal"
    data-modal-toggle="default-modal" data-id="{{ $dataid ?? null }}" type="button"
    class="view-button bg-slate-50 hover:bg-slate-50 focus:ring-4 focus:outline-none focus:ring-bg-slate-50 font-medium rounded-lg text-sm px-2 py-1 text-center dark:bg-slate-50 dark:hover:bg-slate-50 dark:focus:ring-bg-slate-50 shadow"><svg
        class="w-5 h-5 text-blue-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
        viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4 6-9 6s-9-4.8-9-6c0-1.2 4-6 9-6s9 4.8 9 6Z" />
        <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
    </svg></button>

<div id="{{ $id }}-view" role="tooltip"
    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
    {{ $slot }}
    <div class="tooltip-arrow" data-popper-arrow></div>
</div>
