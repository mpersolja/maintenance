<form method="POST" class="inline" action="{{ $_route }}">
  @csrf
  <button
    role="submit"
    type="submit"
    class="p-2 ml-2 border-2 rounded border-red-500 fill-stroke text-red-500 hover:bg-red-500 hover:text-white transition duration-300 ease-in-out"
  >
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
    </svg>
  </button>
</form>
