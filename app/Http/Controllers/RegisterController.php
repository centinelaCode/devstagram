<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
   public function index()
   {
      return view('auth.register');
   }


   public function store(Request $request)
   {
      //! permite hacer debug en laravel
      // dd($request);                  // acede a toda la informaciond el request
      // dd($request->get('name'));     // acede solo a 'name'

      //! validacion en laravel
   }
}
