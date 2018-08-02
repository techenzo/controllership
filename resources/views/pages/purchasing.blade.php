
@extends('layouts.app')

@section('content')



    <h1 class="display-4">Controllership Contract Repository</h1>
    <div class="container">
 
        {{-- search panel with filters --}}
        <div class="container">
            <div class="row">    
                
                <div class="col-xs-8 col-xs-offset-2">
                   
                    
                    <div align ="right" class="input-group">
                        <div class="input-group-btn search-panel">


                                {!! Form::open(['url' => 'purchasing', 'method' => 'get'])!!}
                                    {{ Form::select('vendors', $vendor_lists, null, ['class' => 'btn btn-default dropdown-toggle', 'placeholder' => 'Choose a vendor...']) }}
                                    {{ Form::button('<i class="glyphicon glyphicon-search"></i>', array('type' => 'submit', 'class' => 'btn btn-default'))}}
                                {!! Form::close() !!}
                            {{-- <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span id="search_concept">Filter by Vendorname</span> <span class="caret"></span>
                            </button> --}}

                            
                            
                            {{-- <ul class="dropdown-menu" role="menu">
                                @foreach ($listvendorname as $name)
                                <li><a href="{{action('SortingController@show', '$name->name')}}">{{$name->name}}</a></li>
                                @endforeach
                                <li class="divider"></li>
                                <li><a href="#all">Anything</a></li>
                            </ul> --}}
                            
                        </div>
                        {{-- <input type="hidden" name="search_param" value="all" id="search_param">         
                        <input type="text" class="form-control" name="x" placeholder="Search term...">
                        <span class="">
                            <a href="{{action('SortingController@index')}}/{{$name->name}}">
                            <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                            </a>
                            
                        </span> --}}
                    </div>
                </div>
                
            </div>
        </div>
        <br>

            
        {{-- data table --}}
        <div class="row">
                <div class="col">
                    {{-- <h4>Vendors Details</h4> --}}
                    <div class="table-responsive">    
                        <table id="mytable" class="table table-bordred table-striped"> 
                            <thead>  
                                {{-- <th><input type="checkbox" id="checkall" /></th> --}}
                                <th>ID</th>
                                <th>Vedor Name</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Web Url</th>
                                {{-- <th>Contract Type</th>
                                <th>Category Type</th>
                                <th>Department</th> --}}
                                <th>Effective Date</th>
                                <th>Expiration Date</th>
                                <th>Created by</th>
                                {{-- <th>Files</th> --}}
                                {{-- <th>Edit</th> --}}
                                {{-- <th>Delete</th> --}}
                                @if(!Auth::guest())
                                <th>View</th>
                                @endif
                            </thead>
                            <tbody>
                            @foreach ($vendors as $value)
                            <tr>  
    
                                {{-- this will display only the concatination of contract code and the vendor id --}}
                                <td>   
                                {{$value->code}}
                                <?php
                                $num = $value->id;
                                $num_padded = sprintf("%06d", $num);
                                echo $num_padded;
                                ?>
                                </td>

                              
                                <td>{{ $value->name}}</td>
                                <td>{{ $value->first_name}}</td>
                                <td>{{ $value->last_name}}</td>
                                <td>{{ $value->address}}</td>
                                <td>{{ $value->email}}</td>
                                <td>{{ $value->web_url}}</td>
                                {{-- <td>{{ $value->contract}}</td>
                                <td>{{ $value->category}}</td>
                                <td>{{ $value->department}}</td> --}}
                                <td>{{ $value->effectivedate}}</td>
                                <td>{{ $value->expirationdate}}</td>
                                <td>{{ $value->user['name']}}</td>
                                @if(!Auth::guest())
                                <td>
                                    
                                    <a href="vendor/{{$value->id}}">
                                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="" >
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </button>
                                    </p>
                                    </a>
                                </td>
                                @endif
                                {{-- <td><a href="vendor/{{$value->vendor_id}}/files">View</a></td> --}}
    
                                {{-- <td>
                                    <a href="vendor/{{$value->vendor_id}}">
                                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="" >
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                    </p>
                                    </a>
                                </td> --}}
                                {{-- <td>
                                    <a href="{{action('VendorsController@destroy', $vendor['vendor_id'])}}">
                                        <p data-placement="top" data-toggle="tooltip" title="Delete">
                                            <button class="btn btn-danger btn-xs delete" data-title="Delete" data-toggle="modal" data-target="#delete" data-id="{{ $value->vendor_id }}"><span class="glyphicon glyphicon-trash"></span></button>
                                        </p>
                                    </a>
                                </td> --}}
                            </tr>
                            @endforeach 
                            </tbody>
                        </table>
                        
                        {{-- {{$categories->appends(['s'=>$s])->links()}} --}}
                        <div class="clearfix" ></div>
                            {{-- Pagination --}}
                            {{-- <ul class="pagination pull-right">
                                <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                            </ul>   --}}
                            {{ $vendors->links() }}
                        </div>
                    </div>
                </div>
            </div>

        {{-- modal area for edit --}}
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
  
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
                    </div>
                        {{-- edit form --}}
                        <div class="modal-body">
                            <div class="form-group">
                                <input name = "first_name" id ="first_name" class="form-control " type="text" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <input name = "last_name" id ="last_name" class="form-control " type="text" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <textarea name = "address" id ="address" rows="2" class="form-control" placeholder="Address"></textarea>
                            </div>
                            <div class="form-group">
                                <input name = "email" id ="email" class="form-control " type="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input name = "weburl" id ="weburl" class="form-control " type="text" placeholder="Website Url">
                            </div>
                        </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
                    </div>
           
                </div>
            <!-- /.modal-content --> 
            </div>
            <!-- /.modal-dialog --> 
        </div>
        {{-- modal area for delete --}}
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button> --}}
                            <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                        </div>
                            <div class="modal-body">

                                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
                            </div>
                        <div class="modal-footer ">
                            <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span>Yes</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                        </div>
                    </div>
                <!-- /.modal-content --> 


               
                </div>
                <!-- /.modal-dialog --> 
                
    </div>
@endsection