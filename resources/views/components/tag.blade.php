@props(['textSize' => 'text-2xs'])

<a class="bg-white/10 hover:bg-white/25 p-3 py-1 rounded-xl {{ $textSize }} font-bold cursor-pointer transition-colors duration-300">{{ $slot }}</a>
