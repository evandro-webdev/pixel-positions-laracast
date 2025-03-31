@props(['job', 'auth' => false])

<x-panel class="flex gap-x-6">
  <div>
    <x-employer-logo :employer="$job->employer"/>
  </div>

  <div class="flex-1 flex flex-col">
    <a href="" class="text-sm text-gray-400">{{ $job->employer->name }}</a>
    
    <h3 class="font-bold text-xl mt-3 group-hover:text-blue-600 transition-colors duration-300">
      <a href="{{ $job->url }}" target="_blank">
        {{ $job->title }}
      </a>
    </h3>
    <p class="text-sm text-gray-400 mt-auto">{{ $job->schedule }} - From {{ $job->salary }}</p>
  </div>

  <div class="flex flex-col justify-between items-end">
    <div>
      @foreach ($job->tags as $tag)
        <x-tag :$tag/>
      @endforeach
    </div>
    <div class="flex items-center gap-4 font-medium">
      @if ($auth)
        <a href="/jobs/{{ $job->id }}/edit" class="flex text-blue-600 hover:underline">Edit</a>
        <x-forms.form method="POST" rest-method="DELETE" action="/jobs/{{ $job->id }}">
          <button class="cursor-pointer text-red-600 hover:underline">Delete</button>
        </x-forms.form>
      @endif
    </div>
  </div>
</x-panel>