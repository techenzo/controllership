@extends('layouts.app')

@section('content')


    <h1 class="display-4">Controllership Contract Repository</h1>
    <div class="container">
        <div class="row">    
            {{-- {!! Form::open(['route' => ['vendor.update', $vendor->id], 'method' => 'POST', 'files' => true ]) !!}  --}}
            {{-- {!! Form::open(['route' => ['vendor.update', $vendor->id], 'method' => 'POST', 'files' => true ]) !!}  --}}
            {!! Form::open(['action' => ['VendorsController@update', $vendor->id], 'method' => 'PUT', 'enctype' =>'multipart/form-data']) !!}
           
            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                <form role="form">
                    <h2>Vendor Contact Info</h2>
                    <hr class="colorgraph"> 
                        <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control input-lg" value="{{$vendor->name}}" tabindex="1" readonly>
                        </div>      
                        <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" value="{{$vendor->first_name}}" tabindex="2" >
                                        </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                        <input type="text" name="last_name" id="last_name" class="form-control input-lg" value="{{$vendor->last_name}}" tabindex="3" >
                                        </div>
                                </div>
                        </div>
                        <div class="form-group">
                                <input type="text" name="address" id="address" class="form-control input-lg" value="{{$vendor->address}}" tabindex="4" >
                        </div>
                        <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-lg" value="{{$vendor->email}}" tabindex="5" >
                        </div>
                        <div class="form-group">
                                <input type="text" name="weburl" id="weburl" class="form-control input-lg" value="{{$vendor->web_url}}" tabindex="6" >                               
                        </div>
                    
                

                        {{-- Dropdown --}}
                        <div class="form-group contract">
                                <label for="comment">Contract Type</label>
                                <select name="contract" id ="contract"data-filter="make" class="filter-make filter form-control input-lg" tabindex="7" readonly>                            
                                        <option>{{$vendor->contract_type}}</option>     
                                </select>
                        </div>
                        <div class="row" id="filter">
                                <form>    
                                <div id ="cat" class="form-group col-sm-6 col-xs-6 cat">
                                        <label for="comment">Category Type</label>
                                        <select name="category" id ="category" data-filter="model" class="filter-model filter form-control input-lg" tabindex="8" readonly>                                        
                                                <option>{{ $vendor->category_type}}</option>     
                                        </select>
                                </div>
                                <div class="form-group col-sm-6 col-xs-6 hresources" >
                                        <label for="comment">Department Type</label>
                                        <select name="department" id ="department"data-filter="type" class="filter-type filter form-control input-lg" tabindex="9" readonly>                         
                                                <option value="0" disabled selected>Not Applicable</option>
                                                <option>{{ $vendor->department}}</option>                                  
                                        </select>
                                </div>        
                                </form>
                        </div> 
                        {{-- datepicker --}}
                        <div class="row">
                                <div class='col-sm-6'>
                                        <label for="comment">Effective Date</label>
                                <input name="effectdate" type='text' class="form-control" id='effectdate' value = '{{$vendor->effectivedate}}' tabindex="10" />
                                </div>
                                <div class='col-sm-6'>
                                        <label for="comment">Expiration Date</label>
                                        <input name="expiredate" type='text' class="form-control" id='expiredate' value = '{{$vendor->expirationdate}}' tabindex="11" />
                                </div>
                        </div><br>

                        

                        <div class="form-group">      
                                <label for="comment">Terms of Termination</label>
                                <textarea class="form-control" tabindex="12" rows="5" name ="termination" id="termination" >{{ $vendor->termination}} 
                                </textarea>
                        </div>
                        <div class="form-group">
                                       
                                <label for="comment">Terms of Payment</label>
                                <textarea class="form-control" tabindex="13" rows="5" name= "payment" id="payment" >{{ $vendor->payment}}
                                </textarea>
                        </div>
                        <div class="form-group">
                                        
                                <label for="comment">Estimated Yearly Spend</label>
                                <textarea class="form-control" tabindex="14" rows="5" name = "spend" id="spend" >{{ $vendor->spend}}                     
                                </textarea>
                        </div>
        
                        <div class="form-group">  
                                <label for="comment">Terms of Penalty</label>
                                <textarea class="form-control" tabindex="15" rows="5" name = "penalty" id="penalty" >{{ $vendor->penalty}}
                                </textarea>
                        </div>
                        
                        {{-- files can be show --}}
                        <ul>    
                                @foreach ($files as $filename)     
                               
                                <li class="{{$filename->id}}">
                                                
                                                
                                                {{-- {!!Form::open(['action' => ['FileController@deletefile', $filename->id], 'method' => 'PUT', 'id' => 'FileDeleteTime'])!!} --}}
                                                
                                                {{-- <a href="file"> --}}
                                                <a href="{!! route('file', ['id'=>$filename->id]) !!}"        
                                                <span id = "" title = "Delete" class="btn btn-danger btn-xs glyphicon glyphicon-trash"></span>
                                                </a>
                                                
                                                </span>&nbsp;
                                                {!!Form::close()!!}
                                                <a href="/storage/{!! urldecode(str_replace('public/', '', $filename->filename)) !!}">
                                                <?=str_replace('public/', ' ', $filename->filename)?>
                                               
                                                </a>
                                        {{-- <p>{{$filename->id}}</p> --}}
                                                
                                </li>
                                @endforeach
                              
                        </ul>

                        {{-- <center>
                        <span class="btn btn-default btn-file">                                                          
                                <input type="file" name="photos[]" id="js-upload-files" multiple>
                        </span> --}}

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add File
                        </button>
              
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Upload files</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                        {{-- Content --}}
                                        
                                        <center><span class="btn btn-default btn-file">           
                                                <input type="file" name="photos[]" id="js-upload-files" multiple>
                                        </span></center>
                                    
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                {{-- <button type="button" class="btn btn-primary" id="js-upload-submit">Save changes</button> --}}
                                </div>
                                </div>
                                </div>
                        </div>

                        {{-- buttons --}}
                        <hr class="colorgraph">      
                        <div class="row">
                                <div class="col-xs-12 col-md-6"><a href="/home" class="btn btn-danger btn-block btn-lg" tabindex="16">Cancel</a></div>
                                <div class="col-xs-12 col-md-6"><input type="submit" value="Update" class="btn btn-primary btn-block btn-lg" tabindex="17"></div>
                        </div><br>

                        {{-- <hr class="colorgraph">      
                        
                                
                                <div class="col"><a href="/home" class="btn btn-danger btn-block btn-lg" tabindex="16">Cancel</a></div>
                               
                        <br>
                         --}}

                        
                        {!! Form::close() !!}
                                
            <div>
        </div> 
    </div>         
@endsection