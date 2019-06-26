<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arrival;
use Carbon\Carbon;
class ArrivalTimeController extends Controller
{
    //
    public function __construct()
    {
        // $this->middleware('authMain')->only('store');
    }
    public function index()
    {
        return view('arrival');
    }

    public function store($user)
    {
        // session()->flash('message','You have signed in at ' . Carbon::now() );
        Arrival::create(['user_id' => $user]);
        // Arrival::where('user_id',$user);
        session()->flash('message','You have signed in at ' . Carbon::now()->format('H:i:s'));
        return redirect('/');
    }
}
