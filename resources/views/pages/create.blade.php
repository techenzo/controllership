
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="jumbotron">
        <h3>AP New Request Form</h3>

        {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
            <div class="form-group">
                {{Form::label('request-name', 'Request Name')}}
                {{Form::text('request-name', '', ['class' => 'form-control', 'placeholder' => 'Request Name', 'id' => 'request_name'])}}
            </div>
            <div class="form-group">
                {{Form::label('vendor-number', 'Vendor Number')}}
                {{Form::text('vendor-number', '', ['class' => 'form-control', 'placeholder' => 'Vendor Number', 'id' => 'vendor_number'])}}
                {{Form::label('', '', ['type' => 'hidden', 'id' => 'project-id'])}}
            </div>
            <div class="form-group">
                {{Form::label('vendor-name', 'Vendor Name')}}
                {{Form::text('vendor-name', '', ['class' => 'form-control', 'placeholder' => 'Vendor Name', 'id' => 'vendor_name'])}}
            </div>
            <div class="form-group">
                {{Form::label('inv-date', 'Invoice Date')}}
                {{Form::text('invoice-date', '', ['class' => 'form-control', 'placeholder' => 'Select Invoice Date', 'id' => 'inv_date'])}}
            </div>
            <div class="form-group">
                {{Form::label('date', 'Date')}}
                {{Form::text('date', '', ['class' => 'form-control', 'placeholder' => 'Select Date', 'id' => 'date'])}}
            </div>
            {{Form::submit('Save', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
</div>

@endsection