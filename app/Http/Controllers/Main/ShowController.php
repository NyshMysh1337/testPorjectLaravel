<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Http\Request;

class ShowController extends Controller
{
   public function __invoke(Courses $courses)
   {
       return view('main.show', compact('courses'));
   }
}
