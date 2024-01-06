<x-web-layout>

    <div class="flex flex-wrap pt-14">
        <div class="w-full content">

            <!-- Slider main container -->
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <a href="#">
                            <img src="/assets/slid3.JPG" alt="..."
                                class="object-cover aspect-video w-full lg:h-[35rem]">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#">
                            <img src="/img/gambar2.jpg" alt="..."
                                class="object-cover aspect-video w-full lg:h-[35rem]">
                        </a>
                    </div>
                </div>

                <!-- navigation buttons -->
                <div class="swiper-button-prev bg-none rounded-full w-8 h-8 sm:w-10 sm:h-10 text-gray-400"></div>
                <div class="swiper-button-next bg-none rounded-full w-8 h-8 sm:w-10 sm:h-10 text-gray-400"></div>
            </div>
            <!-- end slider -->

        </div>
    </div>


    {{-- Moto --}}
    <div class="max-w-screen-xl px-4 mx-auto relative z-[1]">
        <div
            class="flex sm:flex-row flex-col justify-center lg:gap-20 md:gap-10 gap-5 sm:-mt-20 mt-2 transition-all duration-500">
            <div
                class="md:w-1/4 w-full sm:h-60 md:h-72 h-32 shadow-lg shadow-gray-800 rounded-sm relative overflow-hidden">
                <img src="/img/gambar2.jpg" alt="..." class="w-full h-full">
                <div
                    class="w-full h-full text-white bg-black z-10 absolute top-0 opacity-80 flex flex-col justify-evenly items-center gap-5 p-5">
                    <h3 class="font-bold md:text-2xl text-md">Moto PPLG XI</h3>
                    <p class="lg:text-lg text-sm text-center">Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit.
                        Vitae,
                        dolorum
                        quidem officia quis
                        error veritatis minima quasi illum voluptate adipisci,</p>
                </div>
            </div>
            <div
                class="md:w-1/4 w-full sm:h-60 md:h-72 h-32 shadow-lg shadow-gray-800 rounded-sm relative overflow-hidden">
                <img src="/img/gambar2.jpg" alt="..." class="w-full h-full">
                <div
                    class="w-full h-full text-white bg-black z-10 absolute top-0 opacity-80 flex flex-col justify-evenly items-center gap-5 p-5">
                    <h3 class="font-bold md:text-2xl text-md">Moto PPLG XI</h3>
                    <p class="lg:text-lg text-sm text-center">Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit.
                        Vitae,
                        dolorum
                        quidem officia quis
                        error veritatis minima quasi illum voluptate adipisci,</p>
                </div>
            </div>
            <div
                class="md:w-1/4 w-full sm:h-60 md:h-72 h-32 shadow-lg shadow-gray-800 rounded-sm relative overflow-hidden">
                <img src="/img/gambar2.jpg" alt="..." class="w-full h-full">
                <div
                    class="w-full h-full text-white bg-black z-10 absolute top-0 opacity-80 flex flex-col justify-evenly items-center gap-5 p-5">
                    <h3 class="font-bold md:text-2xl text-md">Moto PPLG XI</h3>
                    <p class="lg:text-lg text-sm text-center">Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit.
                        Vitae,
                        dolorum
                        quidem officia quis
                        error veritatis minima quasi illum voluptate adipisci,</p>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-screen-xl px-4 mx-auto">

        {{-- Penjelasan Website PPLG --}}
        <div class="md:w-3/5 mt-32 text-center mx-auto">
            <h2 class="text-3xl font-semibold mb-5">Website Pengembangan Perangkat Lunak & GIM (PPLG)</h2>
            <p class="text-lg">Website kompetensi keahlian PPLG merupakan sebuah media online sebagai sarana untuk
                mendukung proses belajar mengajar dan semua informasi akademik maupun non akademik dikompetensi keahlian
                PPLG. Melalui website ini juga bisa menjadi sebuah layanan informasi bagi publik ataupun masyarakat
                untuk mengenal tentang kompetensi keahlian PPLG. </p>
        </div>


        {{-- Tentang Kompetensi --}}
        <div class="mt-40 mx-auto relative">
            <div class="sm:w-80 py-3 px-10 bg-sky-700 -top-8 left-2 absolute">
                <h2 class="text-white text-2xl">Tentang Kompetensi</h2>
            </div>
            <div class="bg-sky-900 md:pl-14 px-5 py-10 rounded-md shadow-lg shadow-gray-700">
                <div
                    class="sm:w-72 w-full sm:h-80 h-60 lg:float-end float-start mr-5 lg:-mt-28 rounded-tl-[3.5rem] rounded-md overflow-hidden shadow-md shadow-sky-900 lg:ml-10">
                    <img src="/assets/kajur.jpeg" alt="..." class="w-full h-full object-cover"
                        title="Fransiskus X.Dominggo Busa, S.Kom">
                </div>
                <p class="lg:w-3/4 w-full text-white leading-8">Program Keahlian Pengembangan Perangkat Lunak & GIM
                    adalah salah satu Kompetensi keahlian dalam
                    bidang teknologi komputer dan informatika ditingkat pendidikan sekolah menengah kejuruan dalam
                    (SMK). Lulusan PPLG dewasa ini sangat dibutuhkan untuk menjawab banyak kebutuhan industri bagi
                    ketersediaan tenaga teknisi dalam bidang pengembangan perangkat lunak atau software beberapa ruang
                    lingkup pekerjaan dibidang PPLG adalah Software Developer, Game Development, Software Tester,
                    Software Engineering, Software Analis dan Integrator, Konsultas IT dan Programmer.</p>
            </div>
        </div>


        {{-- Berita Terkini --}}
        <div class="mt-32">
            <h2 class="text-3xl font-semibold text-center">Berita Terkini</h2>
            <hr class="w-32 h-1 mx-auto mt-3 bg-sky-800 rounded-full">

            <div class="flex flex-wrap justify-center mt-16 gap-10">
                <div class="md:w-[20rem] sm:w-[16rem] w-full shadow-lg shadow-slate-400 rounded-sm overflow-hidden">
                    <img src="/img/gambar1.jpg" alt="..." class="w-full aspect-video object-cover">
                    <div class="px-4 py-3">
                        <span class="text-gray-500">12-12-2023</span>
                        <h3 class="text-lg font-semibold text-gray-800">Title</h3>
                        <p class="text-justify text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Sint incidunt
                            distinctio eos
                            cupiditate neque reiciendis quae quisquam omnis. Cum atque animi aliquid quisquam quas ipsum
                            ex iure in fuga praesentium!</p>
                        <a href="#" class="text-center">
                            <div class="w-full mt-5 py-2 bg-sky-800 text-white">Telusuri</div>
                        </a>
                    </div>
                </div>
                <div class="md:w-[20rem] sm:w-[16rem] w-full shadow-lg shadow-slate-400 rounded-sm overflow-hidden">
                    <img src="/img/gambar1.jpg" alt="..." class="w-full aspect-video object-cover">
                    <div class="px-4 py-3">
                        <span class="text-gray-500">12-12-2023</span>
                        <h3 class="text-lg font-semibold text-gray-800">Title</h3>
                        <p class="text-justify text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Sint incidunt
                            distinctio eos
                            cupiditate neque reiciendis quae quisquam omnis. Cum atque animi aliquid quisquam quas ipsum
                            ex iure in fuga praesentium!</p>
                        <a href="#" class="text-center">
                            <div class="w-full mt-5 py-2 bg-sky-800 text-white">Telusuri</div>
                        </a>
                    </div>
                </div>
                <div class="md:w-[20rem] sm:w-[16rem] w-full shadow-lg shadow-slate-400 rounded-sm overflow-hidden">
                    <img src="/img/gambar1.jpg" alt="..." class="w-full aspect-video object-cover">
                    <div class="px-4 py-3">
                        <span class="text-gray-500">12-12-2023</span>
                        <h3 class="text-lg font-semibold text-gray-800">Title</h3>
                        <p class="text-justify text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Sint incidunt
                            distinctio eos
                            cupiditate neque reiciendis quae quisquam omnis. Cum atque animi aliquid quisquam quas ipsum
                            ex iure in fuga praesentium!</p>
                        <a href="#" class="text-center">
                            <div class="w-full mt-5 py-2 bg-sky-800 text-white">Telusuri</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-10">
                <a href="" class="px-10 py-2 bg-sky-950 text-white text-center rounded-sm">Lihat Semua</a>
            </div>
        </div>


        {{-- Blog --}}
        <div class="flex lg:flex-row flex-col gap-5 mt-32 justify-center">
            <div class="w-3/4 mx-auto">
                <h3 class="text-lg mb-3">Video</h3>
                <div class="w-full aspect-video">
                    <iframe width="100%" height="100%"
                        src="https://www.youtube.com/embed/Nu16eO1Qu88?si=bXZC-WoGUd8ZrxTV"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
            <div>
                <h3 class="text-lg mb-3">Artikel</h3>
                <div class="flex flex-col gap-3">
                    <div class="flex gap-5">
                        <div class="w-52">
                            <img src="/img/gambar1.jpg" alt="..." class="h-full object-cover">
                        </div>
                        <div>
                            <h4 class="text-lg text-gray-800">Title</h4>
                            <p class="text-gray-600">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                Facilis nam
                                veritatis, numquam
                                illum.</p>
                            <a href="" class="text-sky-700">
                                Selengkapnya..
                            </a>
                        </div>
                    </div>
                    <div class="flex gap-5">
                        <div class="w-52">
                            <img src="/img/gambar1.jpg" alt="..." class="h-full object-cover">
                        </div>
                        <div>
                            <h4 class="text-lg text-gray-800">Title</h4>
                            <p class="text-gray-600">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                Facilis nam
                                veritatis, numquam
                                illum.</p>
                            <a href="" class="text-sky-700">
                                Selengkapnya..
                            </a>
                        </div>
                    </div>
                    <div class="flex gap-5">
                        <div class="w-52">
                            <img src="/img/gambar1.jpg" alt="..." class="h-full object-cover">
                        </div>
                        <div>
                            <h4 class="text-lg text-gray-800">Title</h4>
                            <p class="text-gray-600">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                Facilis nam
                                veritatis, numquam
                                illum.</p>
                            <a href="" class="text-sky-700">
                                Selengkapnya..
                            </a>
                        </div>
                    </div>
                    <div class="flex gap-5">
                        <div class="w-52">
                            <img src="/img/gambar1.jpg" alt="..." class="h-full object-cover">
                        </div>
                        <div>
                            <h4 class="text-lg text-gray-800">Title</h4>
                            <p class="text-gray-600">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                Facilis nam
                                veritatis, numquam
                                illum.</p>
                            <a href="" class="text-sky-700">
                                Selengkapnya..
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script type="module">
        import Swiper from "https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.esm.browser.min.js";

        const swiper = new Swiper(".swiper", {
            loop: true,
            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
        });
    </script>

</x-web-layout>
