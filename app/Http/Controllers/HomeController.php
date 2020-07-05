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


	public function get( Request $request )
	{

		$get = Users::where( function($q) use ( $request )
      	{
      		if($request->has('search'))
      		{
      			$q->where('name', 'like' ,  '%'.$request->get('search').'%');
      		};

      	});

      	$get->orderBy('name',$request->get('order'));
	

	    return response()->json( array (
	    	"status"=> true,
	    	"data" => $get->paginate( $request->get('limit') )->toArray()
	    	)
	    , 200 );
	}
}
