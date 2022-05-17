<div id="default-carousel" class="relative pb-10" data-carousel="slide">

    <div class="overflow-hidden relative h-[280px] lg:h-[360px] xl:h-[540px]">

        <div class="duration-700 ease-in-out absolute inset-0 transition-all transform -translate-x-full z-10"
             data-carousel-item="">
            <img src="/images/test_banner_1.jpg"
                 class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
        </div>

        <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-0 z-20"
             data-carousel-item="active">
            <img src="/images/test_banner_2.jpg"
                 class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
        </div>

        <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-full z-10"
             data-carousel-item="">
            <img src="/images/test_banner_3.jpg"
                 class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
        </div>
    </div>

    <!-- Slider controls -->
    <button type="button"
            class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
            data-carousel-prev>
        <span class="inline-flex justify-center items-center w-10 h-10 rounded-full bg-gray-800/30 group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            <span class="hidden">Previous</span>
        </span>
    </button>
    <button type="button"
            class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
            data-carousel-next>
        <span class="inline-flex justify-center items-center w-10 h-10 rounded-full bg-gray-800/30 group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="hidden">Next</span>
        </span>
    </button>
</div>
