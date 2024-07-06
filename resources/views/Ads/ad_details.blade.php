<x-layout>
  <a href="/" class="inline-block text-black ml-4 mb-4">
    <i class="fa-solid fa-arrow-left"></i> Retour
  </a>
  <div class="mx-4">
    <x-card class="p-10">



      <div class="grid grid-cols-1 gap-1 py-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
        <dt class="font-medium text-gray-900">Pic</dt>
        <img class="w-64 md:w-96 mr-0 md:mr-8 mb-4 md:mb-0 rounded-lg" src="{{ $ad->images->url}}" alt="Annonce" />
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

    </x-card>
  </div>
</x-layout>