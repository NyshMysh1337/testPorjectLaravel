<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
   public function __invoke(Courses $courses)
   {
       $courses->delete();
       return redirect()->route('courses.index');
   }
}
