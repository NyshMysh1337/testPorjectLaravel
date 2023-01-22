<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Http\Request;

class IndexController extends Controller
{
   public function __invoke()
   {
       $coursesAll = Courses::all();
//       dd($coursesAll);

       return view('main.index', compact('coursesAll'));
   }
}
