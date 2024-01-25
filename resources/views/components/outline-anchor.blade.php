@props(['href', 'color'])

<div>
    <a href={{ $href }}
        class="text-{{ $color }}-700 hover:text-white border border-{{ $color }}-700 hover:bg-{{ $color }}-800 focus:ring-4 focus:outline-none focus:ring-{{ $color }}-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-{{ $color }}-500 dark:text-{{ $color }}-500 dark:hover:text-white dark:hover:bg-{{ $color }}-500 dark:focus:ring-{{ $color }}-800">{{ $slot }}</a>
</div>
