<x-app-layout>
  <x-slot name="header">
  <div class="flex">
    <h2 class="flex-grow font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Clients') }}
    </h2>
    <x-link-button :href="route('client.create')">
    {{ __('New client') }}
    </x-link-button>
  </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
        @php $columns = [ __('Name'), __('Phone'), '' ] @endphp
        <x-table :columns="$columns">
          @forelse ($clients as $client)
          <tr>
            <td class="border-b-2 border-gray-100 p-4">
            {{ $client->name }}
            </td>
            <td class="border-b-2 border-gray-100 p-4">
            {{ $client->phone }}
            </td>
            <td class="border-b-2 border-gray-100 p-4 flex justify-end">
            <x-show-link-button
              :href="route('client.show', $client)" />
            
            <x-edit-link-button
              :href="route('client.edit', $client)" />

            <x-delete-link-button
              :route="route('client.destroy', $client)"/>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="3" class="p-4 text-center">
            {{ __('No clients to display') }}
            </td>
          </tr>
          @endforelse
        </x-table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
