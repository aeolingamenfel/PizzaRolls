@extends('master.master')

@section('Content')

<div>
    <input type='text' id='Search' placeholder='Search For Product Name' />
    <button onclick='GetPrice()'>Request</button>
</div>
<div id='Output'>
    
</div>

@stop