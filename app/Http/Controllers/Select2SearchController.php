<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class Select2SearchController extends Controller
{
    //
    
    public function index()
    {
    	return view('welcome');
    }

    public function selectSearch(Request $request)
    {
    	$movies = [];

        if($request->has('q')){            $search = $request->q;
            $movies =Movie::select("id", "name")
            		->where('name', 'LIKE', "%$search%")
            		->get();
        }
        return response()->json($movies);
        
    }

    //    $city = [];
    //     $stateID = $request->stateID;
    //     if ($request->has('q')) {
    //         $search = $request->q;
    //         $city = LocCity::select("id", "name")
    //             ->where('state_id', $stateID)
    //             ->Where('name', 'LIKE', "%$search%")
    //             ->get();
    //     } else {
    //         $city = LocCity::where('state_id', $stateID)->limit(10)->get();
    //     }
    //     return response()->json($city);
}
