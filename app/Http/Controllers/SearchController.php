<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Search;
use Input;
use Illuminate\Support\Facades\Redirect;
use DB;

class SearchController extends Controller {
    

	/*
	|--------------------------------------------------------------------------
	| Search Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    
	public function index()
        
	{
        
    $searchterm = Input::get('searchinput');

    if ($searchterm){

        $products = DB::table('products');            
        $results = $products->where('name','LIKE','%'. $searchterm .'%')
        ->orWhere('description','LIKE','%'. $searchterm .'%')
        ->orWhere('brand','LIKE','%'. $searchterm .'%')
        ->get();
        return view('search')->with('results', $results);                 

         }
     }
    public function postSearch()
{


        $q = Input::get('searchinput');
	    $products = DB::table('products')->whereRaw(
	        "MATCH(name,brand) AGAINST(? IN BOOLEAN MODE)", 
	        array($q)
	    )->get();
	    return view('search')->with('products', $products);
    
    }
}
    
    
    




