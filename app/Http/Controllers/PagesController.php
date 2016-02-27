<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function about()
	{
		$name = 'Supachok Iamtham';
		return view('test.about',compact('name'));
	}

	public function ekarat()
	{
		$user = Auth::user();
		if ($user)
		{
			return view('test.solar',compact('name','user'));
		}
		return view('test.solar',compact('name','user'));
	}
}
