<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}
