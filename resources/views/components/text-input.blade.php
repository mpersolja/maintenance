<div class="mb-6">
  <label
    for="{{ $_id }}"
    class="block mb-2 text-sm text-gray-600 dark:text-gray-400">
      {{ $_label }}
  </label>

  <input
    type="text"
    name="{{ $_id }}"
    id="{{ $_id }}"
    value="{{ $_value }}"
    placeholder="{{ $_placeholder }}"
    @if( $_required ) required @endif
    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"
  />
</div>
