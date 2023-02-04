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
//        dump($request->query('per'));
       dump($request->query('per_page'));
       $coursesAll = Courses::paginate($request->get('per_page', 10));
    //   dd($this->perPage);

       return view('courses.index', compact('coursesAll'));
   }
}
