<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
<<<<<<< Updated upstream

        return view('menproduct');
    }
}
=======
        // return view('menproduct');
    }
>>>>>>> Stashed changes
