<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Http\Request;

class StoreController extends Controller
{
   public function __invoke()
   {
       $data = request()->validate([
           'title' => 'string',
           'description' => 'string',
           'duration_h' => 'integer',
       ]);

       Courses::create($data);
       return redirect()->route('courses.index');
   }
}
