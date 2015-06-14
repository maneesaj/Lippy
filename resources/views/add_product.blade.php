@extends('layouts.master')
@section('title','Lippy: Find your perfect shade!')

@section('content')
<section id="uploadbackground">
    <div class="add_Overlay">
    <div id="formproductsadd">
        <ul>
        {!! Form::open(array('action' => 'AddproductController@addproduct', 'files'=>true, 'id'=> 'formaddstyle')) !!}
        <li><h3>ADD A PRODUCT</h3></li>
        <img src="img/iconmonstr-x-mark-icon-256.png" id="addexit" onclick="backhome()" />
        <p id="addmessage"></p>
        <li>{!! Form::label('', 'Lipstick Name:'); !!}</li>
        <li>{!! Form::text('name', '') !!}</li>
        <li>{!! Form::label('', 'Brand Name:'); !!}</li>
        <li>{!! Form::text('brand', '') !!}</li>
        <li>{!! Form::label('', 'Price:'); !!}</li>
        <li>{!! Form::text('price', '') !!}</li>   
        <li>{!! Form::label('', 'Description:'); !!}</li>
        <li>{!! Form::text('description', '') !!}</li>
        <li>{!! Form::label('', 'HEX:'); !!}</li>
        <li>{!! Form::text('HEX','', array('id'=>'HEX', 'onfocus' =>'uploadmessage()')) !!}</li> 
        <li>{!! Form::label('', 'RGB:') !!}</li>
        <li>{!! Form::text('RGB','', array('id'=>'RGB','onfocus' =>'uploadmessage()')) !!}</li>
        <li>{!! Form::label('', 'Colour:'); !!}</li>
        <li>{!! Form::text('Colour', '') !!}</li>
        <li>{!! Form::label('', 'Link:'); !!}</li>
        <li>{!! Form::text('Link', '') !!}</li> 
        <li>{!! Form::file('image',array('id'=>'addfile','class'=>'addImageStyle','onchange'=>'changeadd(this.value)')) !!}</li>
        <li><div id="pickedadd"></div></li>
        <li><span class="submit">{!! Form::submit('Submit', array('id'=>'submitadd','onlick'=>'validateadd()')) !!}</span></li>
        {!! Form::hidden('hidden', '',array('id'=>'hidden')) !!}        
        {!! Form::close() !!}
        </ul>
        <div class="canvascontrol">
            <canvas id="canvasadd" class="canvasadd" >
            </canvas>
        </div>
    </div>
 </div>
</section>
    <div class="clear"></div>
@stop
