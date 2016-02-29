<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session, DB;
use Input;

class EN_Scan_Controller extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
	}


	public function en_scan()
	{
		$user = Auth::user();
		$scan = DB::connection('mysql2')->select('select * from en_scan_log ORDER BY ca_dt DESC ');
		if ($user)
		{
			return view('test.en_scan_result',compact('name','user','scan'));
		}
		return view('test.solar',compact('name','user','scan'));
	}

	public function refresh_scan_log(Request $request)
	{
		$rid = $request->input()['row_id'];
		$log = DB::connection('mysql2')->select('select * from en_scan_log where id > :id ', ['id' => $rid]);
		return \Response::json($log);
//		print_r($log);
//		die();
	}
}
