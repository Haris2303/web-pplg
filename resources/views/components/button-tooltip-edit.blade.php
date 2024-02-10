@props(['href', 'id'])

<div class="bg-slate-50 hover:bg-slate-50 focus:ring-4 focus:outline-none focus:ring-bg-slate-50 font-medium rounded-lg text-sm px-2 py-1 text-center dark:bg-slate-50 dark:hover:bg-slate-50 dark:focus:ring-bg-slate-50 shadow"
    data-tooltip-target="{{ $id }}-edit">
    <a href={{ $href }}><svg class="w-5 h-5 text-green-800" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m14.3 4.8 2.9 2.9M7 7H4a1 1 0 0 0-1 1v10c0 .6.4 1 1 1h11c.6 0 1-.4 1-1v-4.5m2.4-10a2 2 0 0 1 0 3l-6.8 6.8L8 14l.7-3.6 6.9-6.8a2 2 0 0 1 2.8 0Z" />
        </svg></a>
</div>

<div id="{{ $id }}-edit" role="tooltip"
    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
    {{ $slot }}
    <div class="tooltip-arrow" data-popper-arrow></div>
</div>
