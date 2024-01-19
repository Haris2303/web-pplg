<nav class="w-full bg-gray-900 border-gray-700 fixed z-[5] shadow-md top-0">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="/img/logo-pplg.png" class="h-8" alt="PPLG Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">PPLG</span>
        </a>
        <button data-collapse-toggle="navbar-dropdown" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg md:hidden focus:outline-none focus:ring-2 text-gray-400 hover:bg-gray-700 focus:ring-gray-600"
            aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 bg-gray-800 md:bg-gray-900 border-gray-700">
                <li>
                    <a href="/"
                        class="block py-2 px-3 text-white rounded md:bg-transparent md:p-0 md:text-blue-500 bg-blue-600 md:dark:bg-transparent"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="/gallery"
                        class="block py-2 px-3 rounded md:border-0 md:p-0 text-white md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent">Galeri</a>
                </li>
                <li>
                    <a href="/news"
                        class="block py-2 px-3 rounded md:border-0 md:p-0 text-white md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent">Berita</a>
                </li>
                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                        class="flex items-center justify-between w-full py-2 px-3 rounded md:border-0 md:p-0 text-white md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent">Tentang
                        Kami
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar"
                        class="z-10 hidden font-normal divide-y rounded-lg shadow w-44 bg-gray-700 divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="/background"
                                    class="block px-4 py-2 hover:bg-gray-600 hover:text-white text-gray-400">Latar
                                    Belakang</a>
                            </li>
                            <li>
                                <a href="/vision-mision"
                                    class="block px-4 py-2 hover:bg-gray-600 hover:text-white text-gray-400">Visi
                                    Misi</a>
                            </li>
                            <li>
                                <a href="/leadership"
                                    class="block px-4 py-2 hover:bg-gray-600 hover:text-white text-gray-400">Struktur
                                    Kepemimpinan</a>
                            </li>
                            <li>
                                <a href="/teachers"
                                    class="block px-4 py-2 hover:bg-gray-600 hover:text-white text-gray-400">Daftar
                                    Guru</a>
                            </li>
                            <li>
                                <a href="/subjects"
                                    class="block px-4 py-2 hover:bg-gray-600 hover:text-white text-gray-400">Mata
                                    Pelajaran</a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="/about-app"
                                class="block px-4 py-2 text-sm text-gray-300 hover:text-white">Informasi
                                Aplikasi</a>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="/contact"
                        class="block py-2 px-3 rounded md:border-0 md:p-0 text-white md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent">Kontak</a>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li>
                            <a href="{{ url('/dashboard') }}"
                                class="block py-2 px-3 rounded md:border-0 md:p-0 text-white md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent">Dashboard</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}"
                                class="block py-2 px-3 rounded md:border-0 md:p-0 text-white md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent">Login</a>
                        </li>
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
