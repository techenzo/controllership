@extends('layouts.app')


@section('content')

<div class="container">
	<div class="row">
        
        
        
        <div class="col-sm-4">
                <label class="col-xs-4 control-label">Created by: </label>
                <p class="form-control-static">{{$vendor->user['name']}}</p>             
                <label class="col-xs-4 control-label">Created at:</label>
                <p class="form-control-static">{{$vendor->created_at}}</p> 
        </div>
        <h2 align="center">{{$vendor->name}}</h2>
	</div>
    <div class="row">
        <fieldset class="for-panel">
          <legend>Contract Details</legend>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-horizontal">               
                  <label class="col-xs-5 control-label">Contract Type:</label>
                  <p class="form-control-static">{{$vendor->contract_type}}</p>               
                  <label class="col-xs-5 control-label">Category: </label>
                  <p class="form-control-static">{{$vendor->category_type}}</p>               
                    <label class="col-xs-5 control-label">Department: </label>
                    <p class="form-control-static">{{$vendor->department}}</p>                           
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-horizontal">               
                  <label class="col-xs-4 control-label">Effective Date: </label>
                  <p class="form-control-static">{{$vendor->effectivedate}}</p>             
                  <label class="col-xs-4 control-label">Expiration Date:</label>
                  <p class="form-control-static">{{$vendor->expirationdate}}</p>              
                                
              </div>
            </div>
          </div>
        </fieldset>
    </div>

    <div class="row">
        <fieldset class="for-panel">
          <legend>Contact Info</legend>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-horizontal">               
                  <label class="col-xs-5 control-label">Contact Name:</label>
                  <p class="form-control-static">{{$vendor->first_name}} {{$vendor->last_name}}</p>               
                  <label class="col-xs-5 control-label">Address: </label>
                  <p class="form-control-static">{{$vendor->address}}</p>               
                                          
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-horizontal">               
                  <label class="col-xs-4 control-label">Email Address: </label>
                  <p class="form-control-static">{{$vendor->email}}</p>             
                  <label class="col-xs-4 control-label">Website Url:</label>
                  <p class="form-control-static">{{$vendor->web_url}}</p>              
                                
              </div>
            </div>
          </div>
        </fieldset>
    </div>
    


    <hr>
    <div class="form-group">
            <h4 align="center">Terms and Condition:</h4>
            <div class="col-xs-12">
                <div style="border: 1px solid #e5e5e5; height: 200px; overflow: auto; padding: 10px;">
                    <p><label for="Terms of Termination">1. Terms of Termination :</label></p>
                    <p>{{$vendor->termination}}</p>
                    <p><label for="Terms of Termination">2. Terms of Payment :</label></p>
                    <p>{{$vendor->payment}}</p>
                    <p><label for="Terms of Termination">3. Estimated Yearly Spend :</label></p>
                    <p>{{$vendor->spend}}</p>
                    <p><label for="Terms of Termination">4. Terms of Penalty :</label></p>
                    <p>{{$vendor->penalty}}</p>
        
                </div>
            </div>
        </div>
    </div>

    <hr class="colorgraph">      
    {{-- <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3"> --}}

            <div class="col" align ="center"><a href="/home" class="btn btn-danger" tabindex="1">Back</a></div>
        {{-- <div class="col-xs-12 col-md-6"><a href="/home" class="btn btn-danger btn-block btn-lg" tabindex="1">Back</a></div> --}}
        {{-- <div class="col-xs-12 col-md-6"><input type="submit" value="Save" class="btn btn-primary btn-block btn-lg" tabindex="2"></div> --}}
    {{-- </div> --}}
    
    </div>


</div>
@endsection

