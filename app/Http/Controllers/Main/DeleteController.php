<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Material;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{
   public function __invoke(Courses $courses)
   {
       $materials = Material::where('courses_id', $courses->id)->get();
//       dd($materials);
       foreach ($materials as $material) {
//           dd($material);
           if(file_exists(public_path('storage/materials'))){
               Storage::disk('public')->delete('/materials/'.$material);
           }
       }

       $courses->delete();
       return redirect()->route('courses.index');
   }
}
