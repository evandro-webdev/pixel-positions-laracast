<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
  /**
   * Display a listing of the resource.
   */
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

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('jobs.create');
  }

  public function store(Request $request)
  {
    $attributes = $request->validate([
      'title' => ['required'],
      'salary' => ['required'],
      'location' => ['required'],
      'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
      'url' => ['required', 'active_url'],
      'tags' => ['nullable']
    ]);

    $attributes['featured'] = $request->has('featured');

    $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, 'tags'));

    if ($attributes['tags'] ?? false) {
      foreach (explode(',', $attributes['tags']) as $tag) {
        $job->tag($tag);
      }
    }

    return redirect('/');
  }

  /**
   * Display the specified resource.
   */
  public function show(Job $job)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Job $job)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Job $job)
  {
    //
  }
}
