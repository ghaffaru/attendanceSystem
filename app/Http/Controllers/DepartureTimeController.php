<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Departure;
use Carbon\Carbon;
class DepartureTimeController extends Controller
{
    //
    public function index()
    {
        return view('departure');
    }

    public function store($user)
    {
        // Departure::create(['user_id' => $user]);
        // // Arrival::where('user_id',$user);
        // // return $user;
        // // return view('welcome')->session()->flash('message','You have signed in at ' . Carbon::now());

        // session()->flash('message_dep','You have signed out at ' . Carbon::now()->format('H:i:s'));
        // return redirect('/');

        $mainUser = Departure::where('user_id',$user)->whereRaw('DATE(created_at) = CURRENT_DATE')->get();
        // $mainUser = Arrival::where([
        //     'user_id' => $user,
        //     'created_at' => Carbon::now()->format('Y-m-d')
        // ])->get();

        if (count($mainUser) < 1 ){
            Departure::create(['user_id' => $user]);
            session()->flash('message','You have signed out at ' . Carbon::now()->format('H:i:s'));
            return redirect('/');
        }
        else{
            session()->flash('message','You have already signed out today');
            return redirect()->back();
        }  
    }
}
