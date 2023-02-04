<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Http\Request;

class EditController extends Controller
{
   public function __invoke(Courses $courses)
   {
       return view('courses.edit', compact('courses'));
   }
}
