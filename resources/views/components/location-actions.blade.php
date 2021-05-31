<div class="flex justify-end">
@if ($_is_default)
<span class="mr-2 p-2 border-2 border-transparent" title="{{ __('Default location') }}">
  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
  </svg>
</span>
@endif

<a
  href="{{ route('machine.create', $_location_id) }}"
  title="{{ __('Add new machine to location') }}"
  class="border-2 rounded border-green-500 transition duration-300 ease-in-out hover:bg-green-500 hover:text-white fill-storke text-green-500 mr-2 p-2">
<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewbox="0 0 24 24" stroke="currentcolor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 12a3 3 0 11-6 0 3 3 0 016 0z" />
</svg>
</a>

<x-edit-link-button
  :href="route('location.edit', $_location_id)" />

<x-delete-link-button />

</div>
