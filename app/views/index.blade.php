@extends('master.master')

@section('Content')

<div class='box container'>
    <div class='form-group'>
        <label for='Search'>Product Search</label>
        <input type='text' class='form-control' id='Search' placeholder='Enter any product name' />
    </div>
    <button class='btn btn-default' onclick='GetPrice(this)'>Request</button>
</div>
<div class='box container'>
    <div id='OutputImageContainer'>
        <img id='OutputImage' src='' />
    </div>
    <h3 id='OutputHeader'></h3>
    <h4 id='OutputCost'></h4>
    <p id='OutputDescription'></p>
</div>

@stop