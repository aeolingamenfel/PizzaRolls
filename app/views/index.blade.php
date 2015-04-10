@extends('master.master')

@section('Content')

<div class='box container'>
    <div class='form-group'>
        <label for='Search'>Product Search</label>
        <input type='text' class='form-control' id='Search' placeholder='Enter any product name' />
    </div>
    <button class='btn btn-default' onclick='GetPrice()'>Request</button>
</div>
<div class='box container' id='Output'>
    
</div>

@stop