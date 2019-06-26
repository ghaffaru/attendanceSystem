<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arrival;
use App\Departure;

class AdminDashboardController extends Controller
{
    //
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('authMain:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ppl_arr = Arrival::whereDate('created_at',date('Y-m-d'))->get();
        $ppl_dept = Departure::whereDate('created_at',date('Y-m-d'))->get();
        return view('admin.home',compact('ppl_arr','ppl_dept'));
    }
}
