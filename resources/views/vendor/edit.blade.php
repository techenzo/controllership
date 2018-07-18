@extends('layouts.app')

@section('content')


    <h1 class="display-4">Controllership Contract Repository</h1>
    <div class="container">
        <div class="row">    
            {{-- {!! Form::open(['route' => ['vendor.update', $vendor->id], 'method' => 'POST', 'files' => true ]) !!}  --}}
            {!! Form::open(['route' => ['vendor.update', $vendor->vendor_id], 'method' => 'PATCH', 'files' => true ]) !!} 
            {{-- {!! Form::open(['action' => ['VendorsController@update', $vendor->vendor_id], 'method' => 'POST', 'enctype' =>'multipart/form-data']) !!} --}}
           
            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                <form role="form">
                    <h2>Vendor Contact Info</h2>
                    <hr class="colorgraph"> 
                        <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control input-lg" value="{{$vendor->vendor}}" tabindex="1" readonly>
                        </div>      
                        <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" value="{{$vendor->firstname}}" tabindex="2" readonly>
                                        </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                        <input type="text" name="last_name" id="last_name" class="form-control input-lg" value="{{$vendor->lastname}}" tabindex="3" readonly>
                                        </div>
                                </div>
                        </div>
                        <div class="form-group">
                                <input type="text" name="address" id="address" class="form-control input-lg" value="{{$vendor->address}}" tabindex="4" readonly>
                        </div>
                        <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-lg" value="{{$vendor->email}}" tabindex="5" readonly>
                        </div>
                        <div class="form-group">
                                <input type="text" name="weburl" id="weburl" class="form-control input-lg" value="{{$vendor->weburl}}" tabindex="6" readonly>                               
                        </div>
                    
                

                        {{-- Dropdown --}}
                        <div class="form-group contract">
                                <label for="comment">Contract Type</label>
                                <select name="contract" id ="contract"data-filter="make" class="filter-make filter form-control input-lg" tabindex="7" readonly>                            
                                        <option>{{$vendor->contract}}</option>     
                                </select>
                        </div>
                        <div class="row" id="filter">
                                <form>    
                                <div id ="cat" class="form-group col-sm-6 col-xs-6 cat">
                                        <label for="comment">Category Type</label>
                                        <select name="category" id ="category" data-filter="model" class="filter-model filter form-control input-lg" tabindex="8" readonly>                                        
                                                <option>{{ $vendor->category}}</option>     
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
                                <input name="effectdate" type='text' class="form-control" id='effectdate' value = '{{$vendor->effectivedate}}' tabindex="10" readonly/>
                                </div>
                                <div class='col-sm-6'>
                                        <label for="comment">Expiration Date</label>
                                        <input name="expiredate" type='text' class="form-control" id='expiredate' value = '{{$vendor->expirationdate}}' tabindex="11" readonly/>
                                </div>
                        </div><br>

                        

                        <div class="form-group">      
                                <label for="comment">Terms of Termination</label>
                                <textarea class="form-control" tabindex="12" rows="5" name ="termination" id="termination" readonly>{{ $vendor->termination}} 
                                </textarea>
                        </div>
                        <div class="form-group">
                                       
                                <label for="comment">Terms of Payment</label>
                                <textarea class="form-control" tabindex="13" rows="5" name= "payment" id="payment" readonly>{{ $vendor->payment}}
                                </textarea>
                        </div>
                        <div class="form-group">
                                        
                                <label for="comment">Estimated Yearly Spend</label>
                                <textarea class="form-control" tabindex="14" rows="5" name = "spend" id="spend" readonly>{{ $vendor->spend}}                     
                                </textarea>
                        </div>
        
                        <div class="form-group">  
                                <label for="comment">Terms of Penalty</label>
                                <textarea class="form-control" tabindex="15" rows="5" name = "penalty" id="penalty" readonly>{{ $vendor->penalty}}
                                </textarea>
                        </div>
                        {{-- files can be download --}}
                        <ul>    
                        @foreach ($files as $filename)     
                             
                        <li>    

                   
                        <a href="/storage/{!! urldecode(str_replace('public/', '', $filename)) !!}">
                                <?=str_replace('public/', ' ', $filename)?>
                                
                                </a>
                        </li>
                        @endforeach
                        </ul>
                        {{-- buttons --}}
                        {{-- <hr class="colorgraph">      
                        <div class="row">
                                <div class="col-xs-12 col-md-6"><a href="/home" class="btn btn-danger btn-block btn-lg" tabindex="16">Cancel</a></div>
                                <div class="col-xs-12 col-md-6"><input type="submit" value="Update" class="btn btn-primary btn-block btn-lg" tabindex="17"></div>
                        </div><br> --}}

                        <hr class="colorgraph">      
                        
                                
                                <div class="col"><a href="/home" class="btn btn-danger btn-block btn-lg" tabindex="16">Cancel</a></div>
                               
                        <br>
                        

                        
                        {!! Form::close() !!}
                                
            <div>
        </div> 
    </div>         
@endsection