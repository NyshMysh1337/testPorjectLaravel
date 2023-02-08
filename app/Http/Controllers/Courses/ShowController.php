<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Material;
use Illuminate\Http\Request;

class ShowController extends Controller
{
   public function __invoke(Courses $courses)
   {
       return view('courses.show', compact('courses'));
   }
}
