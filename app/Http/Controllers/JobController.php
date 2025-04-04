<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
  public function index()
  {
    $jobs = Job::query()
      ->latest()
      ->with(['employer', 'tags'])
      ->get()
      ->groupBy('featured');

    return view('jobs.index', [
      'jobs' => $jobs[0],
      'featuredJobs' => $jobs[1],
      'tags' => Tag::all()
    ]);
  }

  public function create()
  {
    return view('jobs.create');
  }

  public function store(JobRequest $request)
  {
    $attributes = $request->validated();
    $attributes['featured'] = $request->has('featured');

    $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, 'tags'));
    $job->addTags($request->tags);

    return redirect('/');
  }

  public function edit(Job $job)
  {
    return view('jobs.edit', ['job' => $job]);
  }

  public function update(JobRequest $request, Job $job)
  {
    $attributes = $request->validated();
    $attributes['featured'] = $request->has('featured');

    $job->update(Arr::except($attributes, 'tags'));
    $job->syncTags($request->tags);

    return redirect('/jobs/dashboard');
  }

  public function destroy(Job $job)
  {
    $job->delete();
    return redirect('/jobs/dashboard');
  }
}
