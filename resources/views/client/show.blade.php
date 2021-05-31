<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Client info') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mb-8 max-w-7xl mx-auto sm:px-6 lg:px-8">

      <x-flash-message />

      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

          <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Client data') }}
          </h3>

          <table class="mt-4 w-full table-fixed">
            <tr>
              <th class="text-right px-4 w-2/12">{{ __('Name') }}</th>
              <td class="w-10/12">{{ $client->name }}</td>
            </tr>
            <tr>
              <th class="text-right px-4 w-2/12">{{ __('Address') }}</th>
              <td class="w-10/12">{{ $default_location->address }}</td>
            </tr>
            <tr>
              <th class="text-right px-4 w-2/12">{{ __('Zip') }}</th>
              <td class="w-10/12">{{ $default_location->zip }}</td>
            </tr>
            <tr>
              <th class="text-right px-4 w-2/12">{{ __('Phone') }}</th>
              <td class="w-10/12">{{ $client->phone }}</td>
            </tr>
            <tr>
              <th class="text-right px-4 w-2/12">{{ __('E-mail') }}</th>
              <td class="w-10/12">{{ $client->email }}</td>
            </tr>
          </table>

        </div>
      </div>
    </div>



    <div class="mb-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

          <div class="flex mb-6">
            <h3 class="flex-grow font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Client locations') }}
            </h3>
            <x-link-button :href="route('location.create', $client)">
              {{ __('Add new location') }}
            </x-link-button>
          </div>

          @php $columns = [ __('Address'), __('ZIP'), '' ] @endphp
          <x-table :columns="$columns">
            @forelse ($client->locations as $location)
            <tr>
              <td class="p-4">{{ $location->address }}</td>
              <td class="p-4">{{ $location->zip }}</td>
              <td class="p-4">
                @php $is_default_location = $location->id === $default_location->id @endphp
                <x-location-actions
                  :locationid="$location->id"
                  :isdefault="$is_default_location" />
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="3" class="p-4">{{ __('No locations yet') }}</td>
            </tr>
            @endforelse
          </x-table>

        </div>
      </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

          <h3 class="mb-4 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Client machines') }}
          </h3>

          @php $columns = [
            __('Brand'), __('Model'), __('Location'),
            __('Next service date'), ''
          ] @endphp
          <x-table :columns="$columns">
            @forelse ($client->machines as $machine)
            <tr>
              <td class="p-4">{{ $machine->brand }}</td>
              <td class="p-4">
                <p>{{ $machine->model }}</p>
                <p class="text-sm">({{ $machine->serial_number }})</p>
              </td>
              <td class="p-4">
                <p class="font-semibold">{{ $machine->location->address }}</p>
                <p class="text-sm">{{ $machine->location->zip }}</p>
              </td>
              <td class="p-4">
                {{ $machine->next_service ?? '' }}
              </td>
              <td class="p-4">
                <x-machine-actions :machine="$machine" />
              </td>
            </tr>
            @empty
            <tr>
              <td class="p-4 text-center" colspan="5">
                {{ __('No machines yet') }}
              </td>
            </tr>
            @endforelse
          </x-table>
        </div>
      </div>
    </div>

  </div>
</x-app-layout>
