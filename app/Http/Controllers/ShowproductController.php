<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input;
use DB;

class ShowproductController extends Controller {

	public function index
        
	{
    
		return view('showproduct');
        

	}