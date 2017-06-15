<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Support\Facades\Auth;
use Cache;
use App\Models\User;
use App\Models\Visits;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('active');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::all();

        $visits = Visits::find(18);
        $visits = $visits['count_visits'];
        $visits = json_decode($visits,true);
        //dd($visits);
        return view('user', [
            'users' => $users,
            'visits' => $visits
        ]);
        //return view('user', compact("visits"));
    }
}