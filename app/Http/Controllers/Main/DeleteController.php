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
//       $materials = Material::where('courses_id', $courses->id)->get();
       $materials = $courses->material;
//       dd($materials);
       foreach ($materials as $material) {
//           dd($material->material);
            Storage::disk('public')->delete($material->material);
       }

       $courses->delete();
       return redirect()->route('courses.index');
   }
}
