<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <h3 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
            {{ __('Upcoming maintenance runs') }}
          </h3>
          <p class="mb-4">
            <span class="font-semibold"> {{ __('Time interval:') }} </span>
            {{ $date_from->format(env('DATE_FORMAT')) }} /
            {{ $date_to->format(env('DATE_FORMAT')) }}
          </p>

          @php $columns = [
            __('Client'), __('Location'), __('Machine'), __('Service date'), ''
            ] @endphp

          <x-table :columns="$columns">
            @forelse ($service_runs as $machine)
            <tr>
              <td class="p-4">{{ $machine->client->name }}</td>
              <td class="p-4">
                <p>{{ $machine->location->address }}</p>
                <p class="text-sm">{{ $machine->location->zip }}</p>
              </td>
              <td class="p-4">
                <p>
                  {{ $machine->brand }} {{ $machine->model }}
                </p>
                <p class="text-sm">({{ $machine->serial_number }})</p>
              </td>
              @if ($machine->next_service < $today)
              <td class="p-4 text-red-500">
                {{ $machine->next_service }}
                  <p class="text-sm">{{ __('Missed run') }}</p>
              </td>
              @else
                <td class="p-4">{{ $machine->next_service }}</td>
              @endif
              <td class="p-4">
                <x-link-button :href="'/#'">
                Print
                </x-link-button>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="4" class="p-4 text-center">
                {{ __('No upcomming maintenance runs for given time inteval') }}
              </td>
            </tr>
            @endforelse
          </x-table>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
