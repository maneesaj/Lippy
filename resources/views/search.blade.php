@extends('layouts.master')
@section('title','Lippy: Find your perfect shade!')

@section('content')
<?php var_dump($products) ?>
@foreach($products as $product)
<h5>{{{ $product->name }}}?></h5>
<h5>{{{ $product->brand }}}?></h5>
<h5>{{{ $product->price }}}?></h5>


@endforeach


@stop
