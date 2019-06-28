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
        $mainUser = Arrival::where('user_id',$user)->whereRaw('DATE(created_at) = CURRENT_DATE')->get();
            // $mainUser = Arrival::where([
            //     'user_id' => $user,
            //     'created_at' => Carbon::now()->format('Y-m-d')
            // ])->get();

        if (count($mainUser) < 1 ){
            Arrival::create(['user_id' => $user]);
            session()->flash('message','You have signed in at ' . Carbon::now()->format('H:i:s'));
            return redirect('/');
        }
        else{
          session()->flash('message','You have already signed in today');
          return redirect()->back();
        }  
        // Arrival::where('user_id',$user);
        
    }
}
