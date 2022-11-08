@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'dark:text-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-800 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}>
