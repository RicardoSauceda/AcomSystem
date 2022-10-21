@extends('layouts.app')

@section('title', 'Datos')

@section('content')

<ul>
    <li>{{$contra[0]}}</li>
    <li>{{$usuario[0]}}</li>
     {{--@foreach ($var as $item)
    
    <li>{{$item->nombre}}</li>
    <li>{{$item->email}}</li>
    
    @endforeach--}}
</ul>

@endsection