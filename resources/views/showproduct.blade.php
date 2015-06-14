@extends('layouts.master')
@section('title','Lippy: Find your perfect shade!')

@section('content')
    <div class="results_box">
    @foreach($products as $product)
        <div class="productbox"> 
            <h4>show product with id = {{{$id}}}</h4>
        <img src="{{{ $product->pathtoimage }}}" class="productimage" />
        <ul>
        <li class="product_name">{{{ $product->name }}}</li>
        <li>{{{ $product->brand }}}</li>
        <li>{{{ $product->price }}}</li>
        </ul>
        </div>
    @endforeach        
@stop