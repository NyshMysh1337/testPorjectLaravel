<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
   public function __invoke()
   {
//       dd(1111111);
       return view('main.create');
   }
}
