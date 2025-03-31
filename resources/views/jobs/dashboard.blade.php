<x-layout>
  <x-page-heading>My Jobs</x-page-heading>

  <div class="mt-6 space-y-6">
    @foreach ($jobs as $job)
      <x-job-card-wide :$job auth="{{ Auth::check() }}"/>    
    @endforeach
  </div>
</x-layout>