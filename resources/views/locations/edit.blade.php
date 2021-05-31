<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Edit location') }}
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
          action="{{ route('location.update', $location) }}"
          enctype="multipart/form-data"
          method="POST">

          @csrf
          @method('PUT')

            <x-text-input
              :id="'address'"
              :placeholder="__('1325 Orange road')"
              :required="true"
              :value="$location->address"
              :label="__('Address')" />

            <x-text-input
              :placeholder="__('X4972 Mars Colony, Mars')"
              :label="__('ZIP')"
              :required="true"
              :value="$location->zip"
              :id="'zip'" />

            <div class="mb-4">
              <label
                for="default_location"
                class="text-sm text-gray-600 dark:text-gray-400">

                <input
                  id="default_location"
                  type="checkbox"
                  value="1"
                  @if ($location->default) checked @endif
                  name="default">
                {{ __('Default location') }}

              </label>
            </div>

            <x-submit-button>{{ __('Submit') }}</x-submit-button>

          </form>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
