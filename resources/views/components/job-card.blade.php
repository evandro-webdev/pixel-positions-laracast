@props(['job'])

<x-panel class="flex flex-col text-center">
  <div class="self-start text-sm">{{ $job->employer->name }}</div>
  <div class="py-6">
    <h3 class="text-xl font-bold group-hover:text-blue-600 transition-colors duration-300">
      <a href="{{ $job->url }}" target="_blank">
        {{ $job->title }}
      </a>
    </h3>
    <p class="text-sm mt-6">{{ $job->schedule }} - From {{ $job->salary }}</p>
  </div>

  <div class="flex justify-between items-end mt-auto">
    <div>
      @foreach ($job->tags as $tag)
        <x-tag size="small" :$tag/>
      @endforeach
    </div>

    <x-employer-logo :width="42"/>
  </div>
</x-panel>