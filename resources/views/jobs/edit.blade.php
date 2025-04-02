<x-layout>
  <x-page-heading>Edit Job</x-page-heading>

  <x-forms.form method="POST" rest-method="PATCH" action="/jobs/{{ $job->id }}">
    <x-forms.input label="Title" name="title" value="{{ $job->title }}" placeholder="CEO" />
    <x-forms.input label="Salary" name="salary" value="{{ $job->salary }}" placeholder="$90.000 USD" />
    <x-forms.input label="Location" name="location" value="{{ $job->location }}" placeholder="Winter Park, Florida" />

    <x-forms.select label="Schedule" name="schedule" :selected="$job->schedule" :options="['Part Time', 'Full Time']">
    </x-forms.select>

    <x-forms.input label="URL" name="url" value="{{ $job->url }}" placeholder="https::acme.com/jobs/ceo-wanted" />

    <x-forms.checkbox label="Feature (Costs Extra)" name="featured" :checked="$job->featured ?? false" />

    <x-forms.divider />

    <x-forms.input label="Tags (comma separated)" name="tags" value="{{ $job->tags->implode('name', ', ') }}" placeholder="laracasts, video, education" />

    <x-forms.button class="button">Update</x-forms.button>
  </x-forms.form>
</x-layout>