<div @class([
  'p-4 mb-4 rounded-md leading-4 text-sm dark:bg-gray-900',
  'text-red-800 dark:text-red-400 bg-red-50' => $type === 'error',
  'text-green-800 dark:text-green-400 bg-green-50' => $type === 'success',
  'text-blue-800 dark:text-blue-400 bg-blue-50' => $type === 'info',
])>
  <ul class="list-disc list-inside">
    @foreach ($messages as $message)
      <li>{{ $message }}</li>
    @endforeach
  </ul>
</div>