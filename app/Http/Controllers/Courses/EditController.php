<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Http\Request;

class EditController extends Controller
{
   public function __invoke(Courses $courses)
   {
//       dd($courses->material);
       return view('courses.edit', compact('courses'));
   }
}
