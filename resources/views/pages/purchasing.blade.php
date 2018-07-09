@extends('layouts.app')

@section('content')

    <h1 class="display-4">Controllership Contract Repository</h1>
    <div class="container">
        {{-- search bar --}}
        <div class="row">
            <div class="col-md-12">
                {{-- <form action="{{route('pages.search')}}" method="get"> --}}
                <div class="input-group" id="adv-search">
                <input type="text" class="form-control" name ="s" placeholder="Search Vendors" value="{{isset($s) ? $s : ''}}"/>
                    <div class="input-group-btn">
                        <div class="col btn-group" role="group">
                            <div class="dropdown dropdown-lg">
                            {{-- button search --}}
                            <btton type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>&emsp;
                     
                            <a href="purchasing/create" >
                                <button class="btn btn-add btn-primary"><span class="glyphicon glyphicon-plus"></span></button>
                            </a>
                            </div> 
                        </div> 
                    </div>
                </div>
                </form>
            </div>        
        </div>
        {{-- data table --}}
        <div class="row">
            <div class="col">
                <h4>Vendors Details</h4>
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
                            <th>Contract Type</th>
                            <th>Category Type</th>
                            <th>Department</th>
                            <th>Effective Date</th>
                            <th>Expiration Date</th>

                            {{-- <th>Edit</th> --}}
                            {{-- <th>Delete</th> --}}
                        </thead>
                        <tbody>
                        @foreach ($vendors as $value)
                        <tr>     
                            {{-- <td><input type="checkbox" class="checkthis" /></td> --}}
                            <td>{{$value->vendor_id}}</td>
                            <td>{{ $value->vendor}}</td>
                            <td>{{ $value->firstname}}</td>
                            <td>{{ $value->lastname}}</td>
                            <td>{{ $value->address}}</td>
                            <td>{{ $value->email}}</td>
                            <td>{{ $value->weburl}}</td>
                            <td>{{ $value->contract}}</td>
                            <td>{{ $value->category}}</td>
                            <td>{{ $value->department}}</td>
                            <td>{{ $value->effectivedate}}</td>
                            <td>{{ $value->expirationdate}}</td>

                            {{-- <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td> --}}
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
                    <div class="clearfix"></div>
                        {{-- Pagination --}}
                        <ul class="pagination pull-right">
                            <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                        </ul>  
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