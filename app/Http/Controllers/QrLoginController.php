<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\User;
class QrLoginController extends Controller
{
    public function index(Request $request) {
    	
		return view('auth.QrLogin');
	}
	public function indexoption2(Request $request) {
    	
		return view('auth.QrLogin2');
	}
	public function ViewUserQrCode($value='')
	{
		return view('backEnd.users.viewqrcode');
	}
	public function checkUser(Request $request) {
		 $result =0;
			if ($request->data) {
				$user = User::where('QRpassword',$request->data)->first();
				if ($user) {
				//	Sentinel::authenticate($user);
				    $result = $user->id;
				 }else{
				 	$result =0;
				 }

				
			}
			
			return $result;
	}

	public function QrAutoGenerate(Request $request)
	{	
		$result=0;
		if ($request->action = 'updateqr') {
			$user = Sentinel::getUser();
			if ($user) {
				$qrLogin=bcrypt($user->email . $user->password);
		        $user->QRpassword= $qrLogin;
		        $user->update();
		        $result=1;
			}
		
		}
		
        return $result;
	}

}