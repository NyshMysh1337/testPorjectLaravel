<?php

namespace App\Http\Controllers\Main;

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

       $new_courses = Courses::firstOrCreate($data);
    if($request->has('materials')) {
        foreach ($request->file('materials') as $material) {
            $imageName = $data['title'].'-image-'.time().rand(1, 10000).'.'.$material->extension();
            $material->move(public_path('storage/materials'), $imageName);
//            Storage::disk()
            Material::create([
                'courses_id' => $new_courses->id,
                'material' => $imageName
            ]);
        }
    }
       return redirect()->route('courses.index');
   }
}
