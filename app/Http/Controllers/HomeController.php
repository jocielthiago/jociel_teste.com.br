<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Users;
use App\UsersAcess;

class HomeController extends Controller
{
    public function show()
	{

	    return view('home');
	}


	public function get( Request $request )
	{

		$get = Users::where( function($q) use ( $request )
      	{

			if(!empty($request->get('max_acess')) ||  !empty($request->get('min_acess')) )
			{
		      	$q->whereIn("id", UsersAcess::selectRaw('users_id, count(*) as total')
		                 	->groupBy('users_id')
		                 	->orderBy('total', !empty($request->get('max_acess')) ? 'desc' : 'asc')
				        	->limit('100')->get()->toArray()
				);
				$request->merge(['limit'=> 10, 'page'=> 1]);
		    }
		    else
		    {
	      		if($request->has('search'))
	      		{
	      			$q->where('name', 'like' ,  '%'.$request->get('search').'%');
	      		};
		    };


      	});

		if(empty($request->get('max_acess')) && empty($request->get('min_acess')) )
		{
      		$get->orderBy('name',$request->get('order'));
      	};
	

	    return response()->json( array (
	    	"status"=> true,
	    	"data" => $get->paginate( $request->get('limit') )->toArray()
	    	)
	    , 200 );
	}
}
