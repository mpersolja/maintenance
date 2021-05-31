<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Machine info') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="mb-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

          <h3 class="mb-4 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Machine data') }}
          </h3>

          <table class="w-full">
            <tr>
              <th class="px-2 w-3/12 text-right">{{ __('Brand') }}</th>
              <td class="px-2 w-9/12">{{ $machine->brand }}</td>
            </tr>
            <tr>
              <th class="px-2 w-3/12 text-right">{{ __('Model') }}</th>
              <td class="px-2 w-9/12">{{ $machine->model }}</td>
            </tr>
            <tr>
              <th class="px-2 w-3/12 text-right">{{ __('Serial number') }}</th>
              <td class="px-2 w-9/12 w-3/12">{{ $machine->serial_number }}</td>
            </tr>
            <tr>
              <th class="px-2 w-3/12 text-right">{{ __('Location') }}</th>
              <td class="px-2 w-9/12">
                {{ $machine->location->address }}, {{ $machine->location->zip }}
              </td>
            </tr>
            <tr>
              <th class="px-2 w-3/12 text-right">{{ __('Client') }}</th>
              <td class="px-2 w-9/12">{{ $machine->client->name }}</td>
            </tr>
            <tr>
              <th class="px-2 w-3/12 text-right">{{ __('Service interval') }}</th>
              <td class="px-2 w-9/12">{{ $machine->service_interval }} {{ __('months') }}</td>
            </tr>
            <tr>
              <th class="px-2 w-3/12 text-right">{{ __('Next service') }}</th>
              <td class="px-2 w-9/12">{{ $machine->next_service }}</td>
            </tr>
          </table>

        </div>
      </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

          <div class="flex mb-4 w-full">
            <h3 class="flex-grow font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Reports') }}
            </h3>
            <x-link-button :href="route('report.create', $machine)">
              {{ __('New report') }}
            </x-link-button>
          </div>

          @php $columns = [
              __('Employee'),
              __('Duration'),
              __('Service date'),
              ''
            ]
          @endphp

          <x-table :columns="$columns">
            @forelse ($machine->services as $report)
            <tr>
              <td class="p-4 font-semibold">{{ $report->employee }}</td>
              <td class="p-4 font-semibold">{{ $report->duration }}</td>
              <td class="p-4 font-semibold">{{ $report->created_at->format(env('DATE_FORMAT')) }}</td>
              <td class="">
                <x-print-service-report-button :reportid="$report->id" />
              </td>
            </tr>
            <tr>
              <td class="px-4 border-b-2 border-gray-100 pb-6 mb-6" colspan="5">
                <p class="mb-4 font-semibold uppercase">
                  {{ __('Description') }}
                </p>
                <p>
                  {{ $report->description }}
                </p>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="4" class="p-4 text-center">
                {{ __('No reports yet') }}
              </td>
            </tr>
            @endforelse
          </x-table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
