<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Material;
use Illuminate\Http\Request;

class ShowController extends Controller
{
   public function __invoke(Courses $courses)
   {
//       foreach ($courses->material as $mat) {
//           dump($mat->material);
//       }
       return view('courses.show', compact('courses'));
   }
}
