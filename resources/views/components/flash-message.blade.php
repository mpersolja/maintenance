<div class="my-4">

@if (Session::has('success'))
<div class="block text-sm text-left text-green-600 bg-green-200 border border-green-400 h-12 flex items-center p-4 rounded-sm" role="alert">
  {{ Session::get('success') }}
</div>
@endif

@if (Session::has('info'))
<div class="block text-sm text-left text-blue-600 bg-blue-200 border border-blue-400 h-12 flex items-center p-4 rounded-sm" role="alert">
  {{ Session::get('info') }}
</div>
@endif

@if (Session::has('warning'))
<div class="block text-sm text-left text-yellow-600 bg-yellow-200 border border-yellow-400 h-12 flex items-center p-4 rounded-sm" role="alert">
  {{ Session::get('warning') }}
</div>
@endif

@if (Session::has('danger'))
<div class="block text-sm text-left text-red-600 bg-red-200 border border-red-400 h-12 flex items-center p-4 rounded-sm" role="alert">
  {{ Session::get('danger') }}
</div>
@endif

</div>
