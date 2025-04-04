<x-layout>
  <x-page-heading>Companies hiring</x-page-heading>

  <div class="max-w-[540px] mx-auto space-y-6">
    @foreach ($employers as $employer)
      <x-employer-card-wide :$employer/>
    @endforeach
  </div>
</x-layout>