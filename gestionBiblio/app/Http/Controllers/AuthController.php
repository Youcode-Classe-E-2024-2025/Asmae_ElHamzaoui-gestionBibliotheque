<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showSinUp()
    {
        return view('signup');
    }

    public function showLogin()
    {
        return view('login');
    }

    // Gère l'inscription
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Inscription réussie !');
    }
  // Gère la connexion
  public function login(Request $request)
  {
      $credentials = $request->validate([
          'email' => 'required|email',
          'password' => 'required',
      ]);

      if (Auth::attempt($credentials)) {
          return redirect()->route('dashboard')->with('success', 'Connexion réussie !');
      }

      return back()->withErrors(['email' => 'Les informations de connexion sont incorrectes.']);
  }


  
}

