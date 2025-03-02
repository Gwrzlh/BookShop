<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Cek apakah user sudah login
        if (!Session::has('logged_user')) {
            return redirect()->route('login')->with('error', 'Silahkan login terlebih dahulu');
        }

        // Ambil role user dari session
        $userRole = Session::get('user_role');

        // Cek apakah role user ada dalam daftar yang diperbolehkan
        if (!in_array($userRole, $roles)) {
            return redirect()->route('login')->with('error', 'Anda tidak memiliki akses ke halaman tersebut');
        }

        return $next($request);
    }
}
