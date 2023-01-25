<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Courses\UpdateRequest;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
   public function __invoke(UpdateRequest $request, Courses $courses)
   {
       $data = $request->validated();
       Storage::put('/materials', $data['materials']);
       $courses->update($data);
       return view('main.show', compact('courses'));
   }
}
