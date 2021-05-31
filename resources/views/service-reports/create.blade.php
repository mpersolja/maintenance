<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Create new service report') }}
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

          <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Machine data') }}
          </h3>
          <table class="mb-4 w-full">
            <tr>
              <th class="text-right px-2">{{ __('Model') }}</th>
              <td class="px-2">{{ $machine->model }}</td>
            </tr>
            <tr>
              <th class="text-right px-2">{{ __('Brand') }}</th>
              <td class="px-2">{{ $machine->brand }}</td>
            </tr>
            <tr>
              <th class="text-right px-2">{{ __('Serial number') }}</th>
              <td class="px-2">{{ $machine->serial_number }}</td>
            </tr>
            <tr>
              <th class="text-right px-2">{{ __('Location') }}</th>
              <td class="px-2">{{ $machine->location->address }}, {{ $machine->location->zip }}</td>
            </tr>
            <tr>
              <th class="text-right px-2">{{ __('Client') }}</th>
              <td class="px-2">{{ $machine->client->name }}</td>
            </tr>
            <tr>
              <th class="text-right px-2">{{ __('Service date') }}</th>
              <td class="px-2">{{ \Carbon\Carbon::now()->format(env('DATE_FORMAT')) }}</td>
            </tr>
            <tr>
              <th class="text-right px-2">{{ __('Next service date') }}</th>
              <td class="px-2">{{ \Carbon\Carbon::now()->addMonths($machine->service_interval)->format(env('DATE_FORMAT')) }}</td>
            </tr>
          </table>

          <form
            action="{{ route('report.store') }}"
            method="POST"
            enctype="multipart/form-data"
          >

            @csrf

            <input type="hidden" value="{{ $machine->id }}" name="machine_id">
            <input type="hidden" value="{{ $machine->client->id }}" name="client_id">

            <x-text-input
              :id="'employee'"
              :label="__('Employee')"
              :placeholder="__('John Doe')"
              :required="true"
              :value="old('employee')"
            />

            <x-text-input
              :id="'duration'"
              :label="__('Duration (minutes)')"
              :placeholder="22"
              :value="old('duration')"
              :required="true"
            />

            <label
              for="description"
              class="block mb-2 text-sm text-gray-600 dark:text-gray-400"
            >
              {{ __('Description') }}
            </label>
            <textarea
              id="description"
              name="description"
              required
              class="w-full px-3 py-2 mb-4 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark-placeholder-gray-500 dark:border-gray-600 dakr:focus:ring-gray-900 dark:focus:border-gray-500"
              rows="10">{{ old('description') }}</textarea>

           <x-submit-button>{{ __('Submit') }}</x-submit-button>

          </form>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
