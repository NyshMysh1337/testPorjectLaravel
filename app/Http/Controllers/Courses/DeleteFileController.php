<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Material;
use Illuminate\Support\Facades\Storage;

class DeleteFileController extends Controller
{
   public function __invoke($id)
   {

       $images=Material::findOrFail($id);
           Material::deleteFile($images, $id);
           return back();
   }
}
