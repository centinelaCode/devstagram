<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
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

      //! Modificar el Request
      $request->request->add(['username' => Str::slug($request->username)]);

      //! validacion en laravel
      $this->validate($request, [
         'name' => ['required', 'max:30'],
         'username' => ['required', 'unique:users', 'min:3', 'max:20'],
         'email' => ['required', 'unique:users', 'email', 'max:60'],
         'password' => ['required', 'confirmed', 'min:6', 'max:30'],
      ]);

      // dd('Creando Usuario');

      //! creando un registro (lo guarda en la db)
      User::create([
         'name' => $request->name,
         'username' => $request->username,
         'email' => $request->email,
         'password' => $request->password
         // 'password' => Hash::make( $request->password )  // por si no se hashea el password
      ]);

      // redireccionar el usuario


   }
}
