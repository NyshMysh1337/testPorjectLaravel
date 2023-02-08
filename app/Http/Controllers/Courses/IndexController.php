<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Http\Request;

class IndexController extends Controller
{

   public function __invoke(Request $request)
   {
       $perPageArr = [10, 20, 50, 100];
//        dd($request->all());
       $coursesAll = Courses::paginate($request->query('per_page', 10));

       return view('courses.index', compact('coursesAll', 'perPageArr'));
   }
}
