@extends('layouts.app')

@section('content')
    {{-- <div class="jumbotron jumbotron-fluid text-center">
    <h1 class="display-4">{{$title}}</h1>
    <hr class="my-4">
    <p> 
        <a class="btn btn-warning btn-lg" href="purchasing" role="button">Purchasing</a> 
        <a class="btn btn-danger btn-lg" href="#" role="button">Finance</a>
    </p>
    </div> --}}

    <div class="page-header">
            <h1>{{$title}}</h1>
    </div>
    <div class="container">
            <div class="row pricing">
                    <div class="col-md-6 text-center">
                    <div class="well">
                        <h3><b>Purchasing</b></h3>
                        <hr>
                        <p><b>Create a vendor account.</b></p>
                        <hr>
                        <p><b>Choose contract type.</b></p>
                        <hr>
                        <p><b>Tells about the terms and condition</b></p>
                        <hr>
                        <p><b>Alert the every contract expired.</b></p>
                        <hr>
                        <p><b>Click to create now. </b></p>
                        <hr>
                        <a class="btn btn-warning btn-lg text-center" href="purchasing" role="button">Purchasing</a> 
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="well">
                        <h3><b>Finance</b></h3>
                        <hr>
                        <p><b>Create your account. It’s free.</b></p>
                        <hr>
                        <p><b>Join the millions of Job Seekers using JobHubLk.</b></p>
                        <hr>
                        <p><b>Tell us about yourself.</b></p>
                        <hr>
                        <p><b>Tell us how you want to learn about new job openings.</b></p>
                        <hr>
                        <p><b>One Click Apply to jobs anytime. Anywhere.</b></p>
                        <hr>
                        <a class="btn btn-danger btn-lg" href="#" role="button">Finance</a>
                    </div>
                </div>
            </div>
 </div>
@endsection