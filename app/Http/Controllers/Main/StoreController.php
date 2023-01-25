<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Courses\StoreRequest;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
   public function __invoke(StoreRequest $request)
   {


//       $paths = [];
//
//       foreach ($request->file('materials') as $file) {
//           $paths[] = $file->store('/materials');
//       }

//dd($paths);



//       $data = $request->validated();
//dd($data);
//       $path = [];
//
////       dd($data);
//       foreach ($data['materials'] as $file) {
//         $path[] = Storage::put('/materials', $file);
//       }
//       dd($path);
//       $data['materials'] = $path;
//       foreach ($data['materials'] as $file) {
//           Storage::put('/materials', $file);
//       }
//      $res = array_replace($data['materials'], $path);
//        dd($request->validated());
       $data = $request->validated();

       Storage::put('/materials', $data['materials']);

       Courses::firstOrCreate($data);
       return redirect()->route('courses.index');
   }
}
