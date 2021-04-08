@extends('index')

@section('content')
<strong>latitube:</strong> {{$item->lat}} <br />
<strong>longitube:</strong> {{$item->long}} <br />
<strong>datetime:</strong> {{$item->datetime}}
@endsection