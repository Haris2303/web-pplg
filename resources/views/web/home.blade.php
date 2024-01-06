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
                            <img src="/img/gambar1.jpg" alt="..."
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

    <div class="max-w-screen-xl mx-auto relative px-4 z-[1]">
        <!-- box program -->
        <div
            class="flex sm:flex-row flex-col justify-center lg:gap-20 md:gap-10 gap-5 sm:-mt-40 mt-2 transition-all duration-500">
            <div class="md:w-1/3 w-full sm:h-60 md:h-72 h-32 shadow-lg shadow-gray-800 rounded-sm">
                <img src="/img/gambar1.jpg" alt="..." class="w-full h-full object-cover">
            </div>
            <div class="md:w-1/3 w-full sm:h-60 md:h-72 h-32 shadow-lg shadow-gray-800 rounded-sm relative">
                <img src="/img/gambar2.jpg" alt="..." class="w-full h-full">
                <div
                    class="w-full h-full text-white bg-black z-10 absolute top-0 opacity-80 flex flex-col justify-evenly items-center gap-5 p-5">
                    <h3 class="font-bold md:text-2xl text-md">Moto PPLG XI</h3>
                    <p class="md:text-lg text-sm text-center">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                        Vitae,
                        dolorum
                        quidem officia quis
                        error veritatis minima quasi illum voluptate adipisci,</p>
                </div>
            </div>
            <div class="md:w-1/3 w-full sm:h-60 md:h-72 h-32 shadow-lg shadow-gray-800 rounded-sm">
                <img src="/img/gambar1.jpg" alt="..." class="w-full h-full object-cover">
            </div>
        </div>
    </div>
    <!-- end box program -->

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
