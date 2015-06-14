<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Search;
use Input;
use Illuminate\Support\Facades\Redirect;
use DB;

class SearchController extends Controller {
    

    
	public function index()
        
	{
        
        return view('errors.404');
   
     }
    
    public function postSearch()
{
        
        $q = Input::get('searchinput');
        
        if ($q == "" ||$q == 'all'){
            $products =  DB::table('products')->simplePaginate(10);
                return view('search')->with('products', $products);
        } else {
             $products = DB::table('products')->whereRaw(
	        "MATCH(name,brand,HEX,RGB,colour) AGAINST(? IN BOOLEAN MODE)", 
	        array($q)
	    )->simplePaginate(10); 
                return view('search')->with('products', $products);

        }
    }
      
     public function searchmatch()
	{
         $hex = Input::get('HEX');
            $products = DB::table('products')->whereRaw(
	        "MATCH(HEX,RGB) AGAINST(? IN BOOLEAN MODE)", 
	        array($hex)
	    )->simplePaginate(10);
         
         
	    return view('search')->with('products', $products);
	}
}
    
    
    




