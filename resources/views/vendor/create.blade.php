@extends('layouts.app')

@section('content')
    <h1 class="display-4">{{$title}}</h1>

    <div class="row">
        {!! Form::open(['action' => 'VendorsController@store', 'method' => 'POST', 'enctype' =>'multipart/form-data']) !!}
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                <form role="form">
                        <h2>Vendor Contact Info</h2>
                        <hr class="colorgraph">
                        <div class="form-group">
                                <input type="text" name="vendor_name" id="vendor_name" class="form-control input-lg" placeholder="Vendor Company Name" tabindex="1">
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
                                        <input type="text" name="weburl" id="weburl" class="form-control input-lg" placeholder="Website Url" tabindex="6">
                                                             
                        </div>

                        {{-- @foreach($contract as $state)                                 
                                        <li>{{$contract->type}}</li>  
                        @endforeach --}}
                        {{-- Dropdown             --}}
                        <div class="form-group contract">
                                        <select name="contract" id ="contract"data-filter="make" class="filter-make filter form-control input-lg" tabindex="7">
                                                <option value="0" disabled selected>Contract Type</option>
                                                @foreach($contract as $state)                                 
                                                <option>{{$state->value}}</option>     
                                                @endforeach

                                        </select>
                                </div>
                        <div class="row" id="filter">
                                <form>
                                        
                                        <div id ="cat" class="form-group col-sm-6 col-xs-6 cat">
                                                <select name="category" id ="category" data-filter="model" class="filter-model filter form-control input-lg" tabindex="8">
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
                                        
                                </form>
                        </div>

                        <div class="row">
                                <div class='col-sm-6'>
                                <label for="comment">Effective Date</label>
                                <input name="effectdate" type='text' class="form-control" id='effectdate' tabindex="10"/>
                                </div>
                                <div class='col-sm-6'>
                                <label for="comment">Expiration Date</label>
                                <input name="expiredate" type='text' class="form-control" id='expiredate' tabindex="11"/>
                                </div>
                        </div>
                        <br>
                        
                      


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

                        
                        


                        
                        {{-- pasword --}}
                        {{-- <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                                <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
                                        </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
                                        </div>
                                </div>
                        </div> --}}
                        <div class="row">
                                <div class="col-xs-4 col-sm-3 col-md-3">
                                        <span class="button-checkbox">
                                                {{-- <button type="button" class="btn" data-color="info" tabindex="7">I Agree</button>      --}}
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter" tabindex="16">Upload Files</button>
                  
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Select files from your computer</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                                {{-- UPLOAD FILE --}}
                                                              
                                                                <div class="form-group">
                                                                   
                                                                        {{-- <div class="col-sm-9">
                                                                                <span class="btn btn-default btn-file">
                                                                                <input id="input-2" name="input2[]" type="file" class="file" multiple data-show-upload="true" data-show-caption="true">
                                                                                </span>
                                                                        </div>
                                                                        <br> --}}

                                                                        <!-- Standar Form -->
                                                                        {{-- <h4>Select files from your computer</h4> --}}
                                                                        <form action="" method="post" enctype="multipart/form-data" id="js-upload-form">
                                                                        <div class="form-inline">
                                                                        <center>
                                                                        <div class="form-group">
                                                                                <span class="btn btn-default btn-file">
                                                                                <input type="file" name="files[]" id="js-upload-files" multiple>
                                                                                </span>
                                                                                &nbsp;
                                                                        </div>
                                                                        
                                                                        <button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit">Upload files</button>
                                                                        </div>
                                                                        </form>

                                                                        <!-- Drop Zone -->
                                                                        <h4 class="text-center">Or drag and drop files below</h4>
                                                                        <div class="upload-drop-zone" id="drop-zone">
                                                                        Just drag and drop files here
                                                                        </div>

                                                                        <!-- Progress Bar -->
                                                                        <div class="progress">
                                                                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                                                        <span class="sr-only">60% Complete</span>
                                                                        </div>
                                                                        </div>

                                                                        <!-- Upload Finished -->
                                                                        <div class="js-upload-finished">
                                                                        <h3>Processed files</h3>
                                                                        <div class="list-group">
                                                                        <a href="#" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Success</span>image-01.jpg</a>
                                                                        <a href="#" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Success</span>image-02.jpg</a>
                                                                        </div>
                                                                        </div>
                                                                        </center>
                                                                </div>
                                                                
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                                                        {{-- <button type="button" class="btn btn-primary">Save</button> --}}
                                                        </div>
                                                        </div>
                                                        </div>
                                                </div>
                                        </span>
                                </div>
                                <div class="col-xs-8 col-sm-9 col-md-9">
                                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
                                        By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m" tabindex="18">Terms and Conditions</a> set out by this site, including our Cookie Use.
                                </div>
                        </div>
                        
                        <hr class="colorgraph">
                        
                        <div class="row">
                                <div class="col-xs-12 col-md-6"><a href="/purchasing" class="btn btn-danger btn-block btn-lg" tabindex="19">Cancel</a></div>
                                <div class="col-xs-12 col-md-6"><input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="20"></div>
                        </div>
                        <br>
                </form>
                {!! Form::close() !!}
                <!-- Modal -->
                <div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                        <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
                                        </div>
                                        <div class="modal-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                        </div>
                                        <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
                                        </div>
                                </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
              
                
@endsection

