@props(['employer'])

<x-panel class="flex items-center justify-between">
  <div class="flex items-center gap-x-6">
    <x-employer-logo :employer="$employer" :width="42"/>
    <h3 class="text-xl font-bold group-hover:text-blue-600 transition-colors duration-300"><a href="/employers/{{ $employer->name }}">{{ $employer->name }}</a></h3>
  </div>

  <p>Jobs: {{ $employer->jobs()->count() }}</p>
</x-panel>
