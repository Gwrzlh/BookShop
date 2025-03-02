<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        // // If user is already logged in, redirect to their appropriate dashboard
        // if (Session::has('logged_user')) {
        //     $role = Session::get('user_role');
        //     return $this->redirectBasedOnRole($role);
        // }
        
        return view('login.index');
    }

 // Di LoginController.php
public function auth(Request $request)
{
    $credentials = $request->validate([
        'username' => 'required',
        'password' => 'required'
    ]);

    // Query langsung ke database
    $user = Pengguna::where('username', $request->username)->first();

    // Cek apakah user ditemukan
    if (!$user) {
        return back()->with('error', 'Username tidak ditemukan');
    }

    // Cek password
    if (!Hash::check($request->password, $user->password)) {
        return back()->with('error', 'Password salah');
    }

    // Set session
    Session::put('logged_user', $user->id_pengguna);
    Session::put('user_role', $user->role);
    session()->save();

    // Debugging untuk memastikan session tersimpan
    // dd(Session::all());

    // Redirect berdasarkan role
    if ($user->role == 'Kasir') {
        // dd("Redirecting to kasir"); // Debugging
        return redirect()->route('kasir');
    } elseif ($user->role == 'Owner') {
        // dd("Redirecting to owner"); // Debugging
        return redirect()->route('owner');
    } elseif ($user->role == 'Admin') {
        // dd("Redirecting to admin"); // Debugging
        return redirect()->route('admin');
    }
    
}
public function logout(Request $request)
{
    Auth::logout(); // Logout user dari sistem
    Session::flush(); // Hapus semua session
    $request->session()->invalidate(); // Invalidasi session
    $request->session()->regenerateToken(); // Regenerasi token CSRF

    return redirect('/login')->with('success', 'Anda telah logout');

}
}