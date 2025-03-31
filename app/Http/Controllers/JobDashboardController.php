<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class JobDashboardController extends Controller
{
  public function dashboard()
  {
    $jobs = Auth::user()->employer->jobs()->get();

    return view('jobs.dashboard', ['jobs' => $jobs]);
  }
}
