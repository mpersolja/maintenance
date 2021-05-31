<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Create new location') }}
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
            action="{{ route('location.store') }}"
            enctype="multipart/form-data"
            method="POST"
          >
            @csrf

            <input type="hidden" name="client_id" value="{{ $client->id }}">

            <x-text-input
              :id="'address'"
              :placeholder="'1325 Orange road'"
              :label="__('Address')" />

            <x-text-input
              :id="'zip'"
              :placeholder="'X4972 Mars Colony, Mars'"
              :label="__('ZIP')" />

            <x-submit-button>{{ __('Submit') }}</x-submit-button>

          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
