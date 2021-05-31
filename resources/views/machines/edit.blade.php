<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Edit machine') }}
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

          <h2 class="mb-4 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Client data') }}
          </h2>
          <table class="mb-4 w-full">
            <tr>
              <th>{{ __('Name') }}</th>
              <td>{{ $machine->client->name }}</td>
            </tr>
            <tr>
              <th>{{ __('Phone') }}</th>
              <td>{{ $machine->client->phone }}</td>
            </tr>
            <tr>
              <th>{{ __('E-mail') }}</th>
              <td>{{ $machine->client->email }}</td>
            </tr>
          </table>

          <form
            action="{{ route('machine.update', $machine) }}"
            method="post"
            enctype="multipart/form-data"
          >
            @csrf
            @method('PUT')

            <x-text-input
              :id="'brand'"
              :placeholder="'Epson'"
              :required="true"
              :value="$machine->brand"
              :label="__('Brand')" />

            <x-text-input
              :id="'model'"
              :placeholder="'WorkForce Pro WF-C5210'"
              :required="true"
              :value="$machine->model"
              :label="__('Model')" />

            <x-text-input
              :id="'serial_number'"
              :placeholder="'XYZ-123-456-789'"
              :required="true"
              :value="$machine->serial_number"
              :label="__('Serial number')" />

            <x-text-input
              :id="'active_since'"
              :placeholder="'2002-10-23'"
              :required="true"
              :value="$machine->active_since"
              :label="__('Active since')" />

            <x-text-input
              :id="'service_interval'"
              :placeholder="'2002-10-23'"
              :required="true"
              :value="$machine->service_interval"
              :label="__('Service interval')" />

            <x-text-input
              :id="'next_service'"
              :placeholder="'2002-10-23'"
              :required="true"
              :value="$machine->next_service"
              :label="__('Next service')" />

            <div class="mb-4">
              <label
                for="location"
                class="block mb-2 text-sm text-gray-600 dark:text-gray-400"
              >
                {{ __('Location') }}
              </label>

              <select
                id="location"
                name="location_id"
                class="rounded-md border-gray-300 border-1"
              >
                @forelse ($machine->client->locations as $location)
                <option
                  value="{{ $location->id }}"
                  @if ($location->id == $machine->location_id) selected @endif
                >
                  {{ $location->address }}, {{ $location->zip }}
                </option>
                @empty
                <option value="">{{ __('No locations for client') }}</option>
                @endforelse
              </select>

            </div>

            <x-submit-button>{{ __('Submit') }}</x-submit-button>

          </form>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
