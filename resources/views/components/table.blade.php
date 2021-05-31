<table class="w-full">
  <thead>
    <tr class="text-semibold bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
      @foreach ($_columns as $column)
      <td class="p-4">{{ $column }}</td>
      @endforeach
    </tr>
  </thead>
  <tbody>
    {{ $slot }}
  </tbody>
</table>
