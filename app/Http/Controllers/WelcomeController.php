<?php namespace App\Http\Controllers;
use App\Search;
use Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;


class WelcomeController extends Controller {

	
	public function index()
	{
		return view('welcome');
	}
    

}
