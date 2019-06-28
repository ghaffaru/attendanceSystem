<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arrival;
use App\Departure;
use App\User;

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

    public function userSearch()
    {
        $users = User::all();
        return view('admin.userSearch',compact('users'));
    }

    public function handleUserSearch()
    {
        // dd((int)request('answer'));
        $user_id = (int)request('answer');

        // dd($user_id);
        // $details->created_at);
         $users = User::all();
         $details = Arrival::where('user_id',$user_id)->get();
        //   dd($details->first()['created_at']);
        return view('admin.userSearch',compact('details','users'));
    }

    public function sortDate()
    {
        $ppl_arr = Arrival::whereDate('created_at',request('date'))->get();
        $ppl_dept = Departure::whereDate('created_at',request('date'))->get();
        $date = request('date');
        return view('admin.home',compact('ppl_arr','ppl_dept','date'));
    }

    public function viewQrCodes()
    {
        $users = User::all();
        return view('admin.viewQrCodes',compact('users'));
    }
}
