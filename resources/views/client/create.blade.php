<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Create new client') }}
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

        <form action="{{ route('client.store') }}" method="POST">
        @csrf

        <x-text-input
          :id="'name'"
          :placeholder="'John Doe'"
          :required="true"
          :label="__('Name')" />

        <x-text-input
          :id="'address'"
          :placeholder="'1325 Orange road'"
          :required="true"
          :label="__('Address')" />

        <x-text-input
          :id="'zip'"
          :placeholder="'X4972 Mars Colony, Mars'"
          :label="__('ZIP')" />

        <x-text-input
          :id="'phone'"
          :placeholder="'+00 123 456 789'"
          :required="true"
          :label="__('Phone')" />

        <x-text-input
          :id="'email'"
          :placeholder="'john@doe.com'"
          :label="__('E-mail')" />

        <x-submit-button>{{ __('Submit') }}</x-submit-button>

        </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
