@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-[#214252] dark:focus:border-[#214252] focus:ring-[#214252] dark:focus:ring-[#214252] shadow-sm']) !!}>
