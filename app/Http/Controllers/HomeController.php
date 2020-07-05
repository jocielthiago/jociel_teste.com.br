<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class HomeController extends Controller
{
    public function show()
	{
	    $users = Users::paginate(10);

	    return view('home', compact('users'));
	}
}
