<x-layout>
  <a href="/" class="inline-block text-black ml-4 mb-4">
    <i class="fa-solid fa-arrow-left"></i> Retour
  </a>
  <div class="mx-4">
    <x-card class="p-10">





    <div id="default-carousel" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        @foreach($ad->images as $image)
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{$image->url}}"" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
          </div>
          @endforeach
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
          <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
          <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
          <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
          <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
          <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
          <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
            </svg>
            <span class="sr-only">Previous</span>
          </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
          <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <span class="sr-only">Next</span>
          </span>
        </button>
      </div>


      <div class="flow-root">
        <dl class="-my-3 divide-y divide-gray-100 text-sm">
          <div class="grid grid-cols-1 gap-1 py-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Title</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $ad->title }}</dd>
          </div>

          <div class="grid grid-cols-1 gap-1 py-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Location</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $ad->location }}</dd>
          </div>

          <div class="grid grid-cols-1 gap-1 py-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Price</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $ad->price }}</dd>
          </div>

          <div class="grid grid-cols-1 gap-1 py-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Type</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $ad->type }}</dd>
          </div>

          <div class="grid grid-cols-1 gap-1 py-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Size</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $ad->size }}</dd>
          </div>

          <div class="grid grid-cols-1 gap-1 py-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">rooms number</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $ad->rooms }}</dd>
          </div>

          <div class="grid grid-cols-1 gap-1 py-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">End Date</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $ad->endDate }}</dd>
          </div>


          <div class="grid grid-cols-1 gap-1 py-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Description</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $ad->description }}</dd>
          </div>


          <div class="grid grid-cols-1 gap-1 py-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Conditions</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $ad->conditions }}</dd>
          </div>


          <div class="grid grid-cols-1 gap-1 py-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Features</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $ad->features }}</dd>
          </div>


          <div class="grid grid-cols-1 gap-1 py-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">prices</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $ad->prices }}</dd>
          </div>

          <div class="grid grid-cols-1 gap-1 py-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Rules</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $ad->rules }}</dd>
          </div>


        </dl>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

    </x-card>
  </div>
</x-layout>