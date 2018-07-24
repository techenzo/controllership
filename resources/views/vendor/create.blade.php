@extends('layouts.app')

@section('content')
	<div class="row">
		<section>
        {!! Form::open(['action' => 'VendorsController@store', 'method' => 'POST', 'enctype' =>'multipart/form-data']) !!}
        <div class="wizard">
            {{-- tab icons --}}
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>   
                    </li>
                    <li role="presentation" class="disabled step2">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-tags"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-book"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            {{-- all forms --}}
            <form role="form">
                <div class="tab-content">
                    {{-- STEP 1 --}}
                    <div class="tab-pane active col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3" role="tabpanel" id="step1">
                        <h3>Vendor Details</h3>
                        
                                <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Vendor Company Name" tabindex="1">
                                </div>
                
                        <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="2">
                                        </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                        <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="3">
                                        </div>
                                </div>
                                </div>
                                <div class="form-group">
                                        <input type="text" name="address" id="address" class="form-control input-lg" placeholder="Address" tabindex="4">
                                </div>
                                <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="5">
                                </div>
                                <div class="form-group">
                                <input type="text" name="web_url" id="web_url" class="form-control input-lg" placeholder="Website Url" tabindex="6">
                                                             
                        </div>

                        
                        {{-- <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul> --}}
                    </div>
                    {{-- STEP 2 --}}
                    <div class="tab-pane col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3" role="tabpanel" id="step2">
                        {{-- Dropdown             --}}
                        <div class="form-group">
                                <h3>Contracts</h3>
                                <select name="contract_type" id ="contract_type" data-filter="make" class="filter-make filter form-control input-lg" tabindex="7">
                                        <option value="0" disabled selected>Contract Type</option>
                                        @foreach($contract as $state)                                 
                                        <option>{{$state->value}}</option>     
                                        @endforeach
                                </select>
                                <br>
                        
                            <div class="row" id="filter">   
                                <div id ="cat" class="form-group col-sm-6 col-xs-6 cat">
                                        <select name="category_type" id ="category_type" data-filter="model" class="filter-model filter form-control input-lg" tabindex="8">
                                                <option value="0" disabled selected>Category Type</option>
                                                @foreach($category as $state)                                 
                                                <option>{{ $state->value}}</option>     
                                                @endforeach
                                        </select>
                                </div>
                                <div class="form-group col-sm-6 col-xs-6 hresources" >
                                        <select name="department" id ="department"data-filter="type" class="filter-type filter form-control input-lg" tabindex="9">
                                                <option value="0" disabled selected>Not Applicable</option> 
                                                @foreach($department as $state)                                 
                                                <option>{{ $state->value}}</option>     
                                                @endforeach
                                        </select>
                                </div>
                            </div>

                            <div class="row">
                                    <div class='col-sm-6'>
                                        <label for="comment">Effective Date</label>
                                        <input name="effectivedate" type='text' class="form-control" id='effectdate' tabindex="10"/>
                                    </div>
                                    <div class='col-sm-6'>
                                        <label for="comment">Expiration Date</label>
                                        <input name="expirationdate" type='text' class="form-control" id='expiredate' tabindex="11"/>
                                    </div>
                            </div>
                        
                            {{-- <ul class="list-inline pull-right">
                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                            </ul> --}}
                        </div>
                    </div>
                    {{-- STEP 3 --}}
                    <div class="tab-pane col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3" role="tabpanel" id="step3">
                        <h3>Terms</h3>
                        <div class="form-group">      
                                @foreach($termination as $state)
                                <label for="comment">{{ $state->title}}</label>
                                <textarea class="form-control" rows="5" name ="termination" id="termination" tabindex="12">
                                @endforeach
                                </textarea>
                        </div>
                        <div class="form-group">
                                @foreach($payment as $state)
                                <label for="comment">{{ $state->title}}</label>
                                <textarea class="form-control" rows="5" name= "payment" id="payment" tabindex="13">
                                @endforeach
                                </textarea>
                        </div>
                        <div class="form-group">
                                @foreach($spend as $state)
                                <label for="comment">{{ $state->title}}</label>
                                <textarea class="form-control" rows="5" name = "spend" id="spend" tabindex="14">
                                @endforeach
                                </textarea>
                        </div>

                        <div class="form-group">
                                @foreach($penalty as $state)
                                <label for="comment">{{ $state->title}}</label>
                                <textarea class="form-control" rows="5" name = "penalty" id="penalty" tabindex="15">
                                @endforeach
                                </textarea>
                        </div>
                        {{-- <ul class="list-inline pull-right">
                            <li><a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2"><button type="button" class="btn btn-default prev-step">Previous</button></a></li>
                            <li><button type="button" class="btn btn-default next-step">Next</button></li>  
                        </ul> --}}
                    </div>
                    {{-- STEP 4 --}}
                    <div class="tab-pane col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3" role="tabpanel" id="complete">                                         
                            <div class="modal-body form-group">
                                    {{-- UPLOAD FILE --}}
                                    <h3>Upload Files</h3>
                                    <div class="form-group">

                                            
                                      
                                                    
                                            <div class="form-inline">
                                            <center>
                                                
                                        
                                            <div class="form-group">
                                                    {{--Vendor name save files--}}                                                   
                                                    {{-- <input type="text" id="js-upload-form" name="name" class="name" readonly>                                                                                                                                                                        --}}
                                            </div>
                                            <br>
                                            <br>
                                            <h5 class="modal-title" name="" id="exampleModalLongTitle">Select files from your computer.</h5>                    
                                            <br>
                                            <div class="form-group">
                                                    
                                                    <span class="btn btn-default btn-file">
                                                            
                                                    <input type="file" name="photos[]" id="js-upload-files" multiple>
                                                    </span>
                                                    &nbsp;
                                           
                                            <br>
                                            <br>
                                            {{-- <div class="row">
                                            <div class="col-xs-12 col-md-6"><input type="submit" value="Save" class="btn btn-primary btn-block btn-lg" tabindex="20"></div>
                                            </div> --}}
                                            </form>
                                            <button type="submit" class="btn btn-lg btn-primary" id="js-upload-submit">Save Now</button>

                                          
                                    </div>    
                            </div>
                    </div>
            </form>
        </div>
        {!! Form::close() !!}
        </section>
   </div>
@endsection