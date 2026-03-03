<a {{ $attributes->merge([
    'class' => $active
        ? 'py-2 px-3 bg-gray-200 text-gray-800 rounded shadow-md'
        : 'py-2 px-3 text-gray-700 hover:text-gray-900'
]) }}>
    {{ $slot }}
</a>
