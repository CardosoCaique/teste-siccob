<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;

class UsersController extends Controller
{
	/**
	 * returna para a view principal
	 * @param  Request $request
	 * @return string
	 */
    public function checkAge(Request $request)
	{
		return view("index")
			->with('name', $request->input('name'))
			->with('email', $request->input('email'))
			->with('age', session()->get('age'));
	}
}
