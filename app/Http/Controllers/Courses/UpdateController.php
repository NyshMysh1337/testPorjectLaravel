<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Courses\UpdateRequest;
use App\Models\Courses;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, \App\Http\Requests\Material\UpdateRequest $updateRequest, Courses $courses)
    {
        $data = $request->validated();
        $materials = $courses->material;
        $updateRequest->validated();

        $courses->update($data);
        Material::updateMaterial($request, $courses, $materials);

        return redirect()->route('courses.index');
    }
}
