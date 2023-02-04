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
        $materials = $courses->material;
        foreach ($materials as $material) {
            Material::where('courses_id', $courses->id)->delete();
            Storage::disk('public')->delete($material->material);
        }
        $courses->update($data);
        Material::updateMaterial($request, $courses);

            return redirect()->route('courses.index');
        }
}
