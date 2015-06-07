@extends('layouts.master')
@section('title','Lippy: Find your perfect shade!')

@section('content')
<section id="uploadbackground">
    <div id="formproductsadd">
    {{ Form::open(array('url' => 'foo/bar')) }}
    {{Form::text('name', 'e.g Pink Champagne')}}
    {{ Form::close() }}
    </div>
</section>
@stop
