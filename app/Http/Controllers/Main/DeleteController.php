<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Material;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{
   public function __invoke(Courses $courses)
   {
       $materials = $courses->material;
       foreach ($materials as $material) {
            Storage::disk('public')->delete($material->material);
       }
       $courses->delete();
       return redirect()->route('courses.index');
   }
}
