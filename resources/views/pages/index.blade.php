@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid text-center">
    <h1 class="display-4">{{$title}}</h1>
    <hr class="my-4">
    <p> 
        <a class="btn btn-warning btn-lg" href="purchasing" role="button">Purchasing</a> 
        <a class="btn btn-danger btn-lg" href="#" role="button">Finance</a>
    </p>
    </div>
@endsection