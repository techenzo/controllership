@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <hr class="my-4">
                <p> 
                    <a class="btn btn-warning btn-lg" href="purchasing" role="button">Purchasing</a> 
                    <a class="btn btn-danger btn-lg" href="finance" role="button">Finance</a>
                </p>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
