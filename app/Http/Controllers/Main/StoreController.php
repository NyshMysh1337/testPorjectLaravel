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


       $data = $request->validated();
//dd($data);
//       dd($data['materials']);
//       foreach ($data['materials'] ?? [] as $file) {
//           Storage::put('/materials', $file);
//       }

       Storage::put('/materials', $data['materials']);


       //Можно доработать https://www.tutsmake.com/laravel-9-upload-multiple-files-tutorial/

//       if($request->hasfile('materials'))
//       {
//           foreach($request->file('materials') as $key => $file)
//           {
//               $path = $file->store('public/materials');
//               $name = $file->getClientOriginalName();
//
//               $insert[$key]['name'] = $name;
//               $insert[$key]['path'] = $path;
//
//           }
//       }
//       Courses::insert($insert);

//       foreach ($request->file('materials') as $item) {
//           $materialsName = $data['title'].time().rand(1,10000).'.'.$item->extension();
//           $item->move(public_path('materials', $materialsName));
//       }

       Courses::create($request->validated());
       return redirect()->route('courses.index');
   }
}
