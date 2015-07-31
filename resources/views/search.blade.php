@extends('layouts.master')
@section('title','Lippy: Find your perfect shade!')

@section('content')
    <img src="img/lipssearch.png"/>

    <h5 class="results_find">Your search results for:
<?php 
if(Input::get('searchinput') == !null){
    echo Input::get('searchinput');
} else {
if(Input::get('HEX') == !null){
    echo Input::get('HEX');
    } else {
    echo "No Results Found";
}
}
?></h5>    
<div class="results_box">
<?php if(isset($products)){?>
    @foreach($products as $product)
        
             <div class="productbox">
            <div class="productoverlay">
                 <p>{{{ $product->description}}}</p>
            </div>          
           <img src="{{{ $product->pathtoimage }}}" class="productimage" /> 
            <ul>
            <li class="product_name">{{{ $product->name }}}</li>
            <li>{{{ $product->brand }}}</li>
            <li>{{{ $product->price }}}</li>
            <div class="prdtextBtnText">  
             <a target="_blank" href="{{{ $product->link}}}"><div id="shopnow">Shop Now</div></a>    
            </div>      
            </ul>    
        </div>
    
        @endforeach
        <?php } else {?>   
            <?php echo "No products found" ?>
        <?php } ?>

</div>
@stop
