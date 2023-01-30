<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Courses\UpdateRequest;
use App\Models\Courses;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
   public function __invoke(UpdateRequest $request, Courses $courses)
   {
       $data = $request->validated();
       $materials = Material::where('courses_id', $courses->id)->get();
       foreach ($materials as $material) {
           Storage::delete($material->material);
       }
       $new_courses = $courses->update($data);
       foreach ($request->file('materials') as $material) {
           $imageName = $data['title'].'-image-'.time().rand(1, 10000).'.'.$material->extension();
           $material->move(public_path('storage/materials'), $imageName);
           Material::create([
               'courses_id' => $courses->id,
               'material' => $imageName
           ]);
       }

       return view('main.show', compact('courses'));
   }
}
