<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LogOutController extends Controller
{
    /**
     * Handle an incoming logout request.
     *
     * 
     */
    use AuthenticatesUsers;
    // public function logout(Request $request)
    // {
    //     Auth::logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return response()->json(['message' => 'Logged out successfully']);
    // }
}