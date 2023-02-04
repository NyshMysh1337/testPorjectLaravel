<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Http\Request;

class IndexController extends Controller
{

   public function __invoke(Request $request)
   {
       $perPageArr = [10, 20, 50, 100];
//        dd($request->get('per_page'));
       $coursesAll = Courses::paginate($request->get('per_page'));

       return view('courses.index', compact('coursesAll', 'perPageArr'));
   }
}
