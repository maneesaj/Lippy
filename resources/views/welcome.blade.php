@extends('layouts.master')
@section('title','Lippy: Find your perfect shade!')

@section('content')
    <div id="PictureUpload" class="PictureUpload">
                <canvas id="canvas_picker">
                </canvas>
     <div>
        {!! Form::model(null, array('route' => array('match.search'))) !!}
        <ul>
        <li><div id="hex">HEX:{!! Form::text('HEX') !!}</div></li>
        <li><div id="rgb">RGB:{!! Form::text('RGB') !!}</div></li>
        <li><div id="picked"></div></li>
        <li>{!! Form::submit('Find Match', array('id' => 'submitbtn')) !!}</li>
        </ul>
        {!! Form::close('Search') !!}
     </div>

    </div>
    <div id="close" class="welcome">
          <img src="img/iconmonstr-x-mark-icon-256.png" alt="close pop up" class="exit" onclick="nonedisplay()"/>
                 <img src="img/LippyLogored.png" class="welcomelogo" alt="logo"/>
                <p class="welcome_note">Welcome to Lippy</p>
               <p class="welcome_note"> Thanks for visiting.Here at Lippy, we love lipstick.To find your perfect colour, upload an image and click on a colour and submit it to find a product match. You can also search for product buy brand or by simply entering the name of a colour e.g red, NARS.
                </p>
          <img src="img/enjoy.png" class="enjoy" alt="enjoy"/>
    </div>
    <section id="uploadbackground">
        <img src="img/ajax-loader.gif" class="loader" id="loader" />
        <p id="Message"></p>

        <form class="form_position" enctype="multipart/form-data">
               <div class="custom_file_upload">
               <input type="text" class="file" name="file_info" id="file_info">
               <div class="file_upload">
               <input type="file" id="file_upload" name="file_upload" onchange="changefile(this.value)">
                   </div>
                </div>
            <input type="button" value="Lets Get Started" class="buttonstyle" id="click" onclick="validation()"/>
        </form> 
        
        
    </section>
    <section class="OptionsBox">
            <div class="OptionsContainer">
            <a href="{{URL::to('add_product')}}"><div class="the_box float">
                <img class="space" src="img/lipsticks.jpg" />
                <h3 class="OptionStyle">Want to upload a product? Use colour picker on a product to add the correct colour to the database </h3>
            </div>
                </a>
            <div class="the_box float " onclick="reminder()">
                <img class="space" src="/img/tumblr_lv5e0v44ED1r35jnso1_500.jpg" />
                <h3 class="OptionStyle">Upload an image and and choose a colour to find a perfect match or search our database by colour or brand</h3>
            </div>
          </div> 
    </section>

@stop
