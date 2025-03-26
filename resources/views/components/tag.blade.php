@props(['size' => 'base'])

@php
  $classes = "bg-white/10 hover:bg-white/25 rounded-xl font-bold cursor-pointer transition-colors duration-300";

  if($size === 'base'){
    $classes .= " px-5 py-1 text-sm";
  }

  if($size === 'small'){
    $classes .= " p-3 py-1 text-2xs";
  }
@endphp

<a class="{{ $classes }}">{{ $slot }}</a>