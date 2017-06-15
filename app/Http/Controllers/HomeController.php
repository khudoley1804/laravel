<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Auth;
use App\Models\Visits;
use Cache;
use Carbon\Carbon;

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
     * Методля записи посещений страниц из кэша в базу
     *
     * @return \Illuminate\Http\Response
     */

    public function addVisits() {
        $statistic = Cache::get('statistic');
        $statistic = json_encode($statistic);
        $time = Carbon::now();
        $visits = [
            'count_visits' => $statistic,
            'dateTime' => $time
        ];
        Visits::create($visits);
        Cache::tags('statistic')->flush();

        return redirect('user');
    }
}
