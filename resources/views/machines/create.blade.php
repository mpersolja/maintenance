<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Create machine') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

          @if ($errors->any())
          <div class="border-2 rounded-md border-red-500 p-2 mb-6">
            <x-auth-validation-errors />
          </div>
          @endif

          <x-flash-message />

          <form
            action="{{ route('machine.store') }}"
            method="post"
            enctype="multipart/form-data"
          >
            @csrf

            <input type="hidden" name="location_id" value="{{ $location->id }}">

            <x-text-input
              :id="'brand'"
              :placeholder="'Epson'"
              :required="true"
              :label="__('Brand')" />

            <x-text-input
              :id="'model'"
              :placeholder="'WorkForce Pro WF-C5210'"
              :required="true"
              :label="__('Model')" />

            <x-text-input
              :id="'serial_number'"
              :placeholder="'XYZ-123-456-789'"
              :required="true"
              :label="__('Serial number')" />

            <x-text-input
              :id="'service_interval'"
              :placeholder="'6'"
              :required="true"
              :label="__('Service interval (in months)')" />

            <x-text-input
              :id="'active_since'"
              :placeholder="'2002-10-23'"
              :required="true"
              :label="__('Active since')" />

            <x-text-input
              :id="'next_service'"
              :placeholder="'2021-04-22'"
              :required="true"
              :label="__('Next service date')" />

            <x-submit-button>{{ __('Submit') }}</x-submit-button>

          </form>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
