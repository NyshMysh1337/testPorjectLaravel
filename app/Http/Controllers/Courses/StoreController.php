<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Courses\StoreRequest;
use App\Models\Courses;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, \App\Http\Requests\Material\StoreRequest $storeRequest)
    {

        $data = $request->validated();
        $storeRequest->validated();
        $newCourses = Courses::firstOrCreate($data);

        Material::store($request, $newCourses);


        return redirect()->route('courses.index');
        }
    }

