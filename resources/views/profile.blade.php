@extends('layouts.app')


@section('content')
    <div class ="container">
        <div class ="row">
            <div class="col-md-8 col-md-offset-2">
            <img src ="/uploads/avatars/{{$user->avatar}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px">
                <h2>{{$user->name}}'s Profile</h2>
                <form enctype = "multipart/form-data"  action="/profile" method="post">
                    <label for="">Update Profile Image</label>
                    <input type="file" name ="avatar">
                    <input type="hidden" name ="_token" value="{{csrf_token()}}">
                    <br>
                    <input type="submit" class="btn-btn-sm btn-primary" value="Upload">
                    {{-- <input type="submit" class="pull-right btn-btn-sm btn-primary" value="Upload"> --}}
                </form>
            </div>

            {{-- Profile --}}
            <div class="tab-pane active col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                <h3>ID no:
                    <?php
                    $num = $user->id;
                    $num_padded = sprintf("%04d", $num);
                    echo $num_padded;
                    ?>
                </h3>
                        <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control input-lg" value={{$user->name}} tabindex="1" readonly>
                        </div>
                        <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-lg" value={{$user->email}} tabindex="2" readonly>
                        </div>
                        <div class="form-group">
                        <input type="text" name="web_url" id="web_url" class="form-control input-lg" value={{$user->created_at}} tabindex="3" readonly>                                
                </div>
            </div>  
        </div>


    </div>


@endsection
