<div class="flex justify-end">
@if ($_machine->services->count() > 0)
  <a
    href="{{ route('machine.show', $_machine) }}"
    title="{{ __('Show machine reports') }}"
    class="p-2 mr-2 border-2 border-indigo-500 stroke-fill text-indigo-500 hover:bg-indigo-500 hover:text-white rounded"
  >
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
    </svg>
  </a>
@endif
  <a
    href="{{ route('report.create', $_machine) }}"
    title="{{ __('Create new report for machine') }}"
    class="p-2 border-2 border-green-500 rounded transition duration-300 ease-in-out hover:bg-green-500 hover:text-white stroke-fill text-green-500 mr-2"
  >
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
    </svg>
  </a>

  <x-edit-link-button
    :href="route('machine.edit', $_machine)" />

  <x-delete-link-button />

</div>
