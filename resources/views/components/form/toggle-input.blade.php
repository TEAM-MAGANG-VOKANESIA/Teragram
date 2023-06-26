@props([
    'disabled' => false,
    'name' => '',
    'value' => '',
    'id' => '',
])

<label class="relative inline-flex items-center cursor-pointer">
    <input type="checkbox" value="" {{ $disabled ? 'disabled' : '' }} name="{{ $name }}"
        value="{{ $value }}" id="{{ $id }}" class="sr-only peer">
    <div
        class="w-14 h-7 bg-gray-400 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-200 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-[#62CDFF]">
    </div>
</label>
