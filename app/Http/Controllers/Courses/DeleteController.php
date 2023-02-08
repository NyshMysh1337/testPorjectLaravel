<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Material;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{
   public function __invoke(Courses $courses)
   {
       $materials = $courses->material;
       Courses::deleteCourse($materials, $courses);
       return redirect()->route('courses.index');
   }
}
