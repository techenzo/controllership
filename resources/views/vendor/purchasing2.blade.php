@extends('layouts.app')

@section('content')


    <h1 class="display-4">Controllership Contract Repository</h1>
    <div class="container">
        <div class="row">    
            {!! Form::open(['route' => ['vendor.update', $vendor->vendor_id], 'method' => 'PATCH', 'files' => true]) !!} 
            {{-- {!! Form::open(['action' => ['VendorsController@update', $vendor->vendor_id], 'method' => 'Patch', 'files' => true]) !!}          --}}
            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                <form role="form">
                    <h2>Vendor Contact Info</h2>
                    <hr class="colorgraph">
                        <div class="form-group">
                                <input type="text" name="vendor_name" id="vendor_name" class="form-control input-lg" value="{{$vendor->vendor}}" tabindex="1">
                        </div>      
                        <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" value="{{$vendor->firstname}}" tabindex="4">
                                        </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                        <input type="text" name="last_name" id="last_name" class="form-control input-lg" value="{{$vendor->lastname}}" tabindex="5">
                                        </div>
                                </div>
                        </div>
                        <div class="form-group">
                                <input type="text" name="address" id="address" class="form-control input-lg" value="{{$vendor->address}}" tabindex="6">
                        </div>
                        <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-lg" value="{{$vendor->email}}" tabindex="7">
                        </div>
                        <div class="form-group">
                                <input type="text" name="weburl" id="weburl" class="form-control input-lg" value="{{$vendor->weburl}}" tabindex="8">                               
                        </div>
                    {!! Form::close() !!}

                <hr class="colorgraph">      
                    <div class="row">
                            <div class="col-xs-12 col-md-6"><a href="#" class="btn btn-danger btn-block btn-lg">Cancel</a></div>
                            <div class="col-xs-12 col-md-6"><input type="submit" value="Update" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                    </div>
            <div>
            {!! Form::close() !!}
        </div>
    </div>         
@endsection