<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Http\Request;

class IndexController extends Controller
{

//    public function subIndexMore($cat, $perPage) {
//        $request->has('numProducts') ? $perPage = $request->get('numProducts') : 10;
//
//        $products = Courses::paginate($perPage);
//        return view('pages.category',compact('products', 'category'));
//    }

   public function __invoke(Request $request)
   {
//       dd($request->query());

       $coursesAll = Courses::paginate($request->query('per'));
    //   dd($this->perPage);

       return view('main.index', compact('coursesAll'));
   }
}
