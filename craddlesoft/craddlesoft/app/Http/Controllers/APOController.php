<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APOController extends Controller
{
  public function appointments()
  {
    return view('motherapo');
  }
}
