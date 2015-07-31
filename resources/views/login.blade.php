@extends('layouts.master')
@section('title','Lippy: Find your perfect shade!')

@section('content')
<section id="uploadbackground">
    <div class="add_Overlay">
    <div id="formproductsadd">
        <div class="logintitle">
            <h5>Log In / Register</h5>
                    <img src="img/iconmonstr-x-mark-icon-256.png" id="exitlogin" onclick="backhome()" />
        <ul> 
        <li>{!! Form::label('', 'Email:'); !!}</li>
        <li>{!! Form::text('email', '') !!}</li>
        <li>{!! Form::label('', 'Password:'); !!}</li>
        <li>{!! Form::password ('password', '') !!}</li>
        <li>{!! Form::submit('Log in', array('id' => 'loginsubmit')) !!}</li>
        </ul>       
        </div>
        </div>
    </div>
</section>
@stop