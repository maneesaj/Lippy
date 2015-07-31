<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input;
use DB;

class AddproductController extends Controller {

	public function index()
        
	{
    
		return view('add_product');


	}
    
    function addproduct(){
        
        $Inputname = Input::get('name');
        $Inputbrand = Input::get('brand');
        $Inputprice = Input::get('price');
        $InputD = Input::get('description');
        $Inputhex = Input::get('HEX');
        $Inputrgb = Input::get('RGB');
        $Inputcolour = Input::get('colour');
        $ColourListInput = Input::get('ColourList');
        $Inputlink = Input::get('Link');
        $Inputfile = Input::file('image');
                
        $destinationPath = public_path().'/img/Uploaded';
        $file            = $Inputfile;
        $destinationPath = 'img';
        $filename        = $file->getClientOriginalName();
        $uploadSuccess   = $file->move($destinationPath, $filename);
        
        
             
        DB::table('products')->insert(array(
            'name' => $Inputname,'brand' =>$Inputbrand,'price' =>$Inputprice,'description' => $InputD,'HEX' => $Inputhex,'RGB' => $Inputrgb,'colour' => $Inputcolour, 'pathtoimage' =>$uploadSuccess,'link' =>$Inputlink,'ColourList' => $ColourListInput));
           
             
        return redirect('add_product')->withMessage('Product successfully uploaded for approval!');
    }

}


