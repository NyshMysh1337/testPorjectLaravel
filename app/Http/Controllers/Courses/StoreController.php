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
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        $newCourses = Courses::firstOrCreate($data);
//        dd($request->file('materials'));

        Material::store($request, $newCourses);


        return redirect()->route('courses.index');
        }
    }

