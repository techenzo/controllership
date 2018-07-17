@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
             
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        
                            
                        {{-- data table --}}
                        <div class="row">
                            <div class="col"> 
                                @if(count($vendors)  > 0)
                                <h4>Vendors Details</h4>  
                                <table class="table table-striped">
                                    <thead>
                                            <th>ID</th>
                                            <th>Vedor Name</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                
                                            <th>View</th>
                                    </thead>
                                    @foreach($vendors as $value)
                                    <tr>    <td>
                                            {{$value->code}}
                                            <?php
                                            $num = $value->vendor_id;
                                            $num_padded = sprintf("%06d", $num);
                                            echo $num_padded;
                                            ?>
                                            </td>
                                            <td>{{ $value->vendor}}</td>
                                            <td>{{ $value->firstname}}</td>
                                            <td>{{ $value->lastname}}</td>
                
                                            <td>
                                                <a href="vendor/{{$value->vendor_id}}">
                                                <p data-placement="top" data-toggle="tooltip" title="Edit">
                                                    <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="" >
                                                        <span class="glyphicon glyphicon-eye-open"></span>
                                                    </button>
                                                </p>
                                                </a>
                                            </td>
                                    </tr>
                                    @endforeach
                                </table>

                        
                                {{$vendors->links()}}

                                

                               
                                @else
                                <h1 align="center">You have no vendor post.</h1>                                        
                                @endif

                                <br>

                                <div align="center">
                                    <a href="purchasing/create" >
                                    <button class="btn btn-add btn-primary"><span class="glyphicon glyphicon-plus"> New Vendor</span></button>
                                    </a>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
