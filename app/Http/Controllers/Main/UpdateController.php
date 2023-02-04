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
//        $coursesAll = Courses::all();
        $data = $request->validated();
//        $materials = Material::where('courses_id', $courses->id)->get();
        $materials = $courses->material;
        foreach ($materials as $material) {
            Material::where('courses_id', $courses->id)->delete();
            Storage::disk('public')->delete($material->material);
        }
        $new_courses = $courses->update($data);
        if ($request->hasfile('materials')) {
            foreach ($request->file('materials') as $file) {
                $path = Storage::disk('public')->put('materials', $file);
                $new_file_name = time() . "_" . uniqid() . "_" . $file->getClientOriginalName();

                Material::create([
                    'courses_id' => $courses->id,
                    'material' => $path
                ]);
            }

            return redirect()->route('courses.index');
        }
    }
}
