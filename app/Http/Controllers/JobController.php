<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;

class JobController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $jobs = Job::all()->groupBy('featured');

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
    //
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
