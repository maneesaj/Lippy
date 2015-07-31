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
        
        return view('search');   
     }
    
    public function postSearch()
{
        
        $q = Input::get('searchinput');      
        if ($q == "" ||$q == 'all'){
            $products =  DB::table('products');
	    return view('search')->with('products', $products->get());
                                    
        } else {
             $products = DB::table('products')->whereRaw(
	        "MATCH(name,brand,HEX,RGB,ColourList,colour) AGAINST(? IN BOOLEAN MODE)", 
	        array($q)
	    )->get(); 
	    return view('search')->with('products', $products);
        }
    }
      
     public function searchmatch()
	{
         $hex = Input::get('HEX');
         $rgb = Input::get('RGB');
         $Inputcolour = Input::get('colour');
         $ColourListInput = Input::get('ColourList');
         
         $products = DB::table('products')
        ->whereRaw('MATCH(HEX,RGB,ColourList,colour) AGAINST(? IN BOOLEAN MODE)', array("$hex $rgb $Inputcolour $ColourListInput"));             
         
         
	    return view('search')->with('products', $products->get());
	}
}
    
    




