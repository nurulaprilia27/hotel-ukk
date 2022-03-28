<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class RedirectAuthenticatedUsersController extends Controller
{
    public function home()
    {
        if (Auth::check()) {
            if (in_array(auth()->user()->role, ['admin', 'resepsionis'], true)) {
                return redirect()->route('dashboard');
            } elseif (auth()->user()->role === 'tamu') {
                return redirect('/home');
            } else {
                return auth()->logout();
            }
        } else {
            return redirect()->route('home');
        }
    }
}
