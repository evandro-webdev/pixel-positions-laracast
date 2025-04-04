<?php

namespace App\Http\Controllers;

use App\Models\Employer;

class EmployerController extends Controller
{
  public function index()
  {
    return view('employers.index', ['employers' => Employer::with(['jobs'])->get()]);
  }
}
