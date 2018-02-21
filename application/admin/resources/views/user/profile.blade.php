@extends('layouts.app')
@include('layouts.breadcumb')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    @yield('bread')
    <div class="row">
        <div class="col-md-12">

            @if(session()->has('message'))
            <div class="alert bg-success">
                {{ session()->get('message') }}
                <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a>
            </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="canvas-wrapper">
                        <ul class="nav nav-tabs tabs customtab">
                            <!--                                <li class="tab active">
                                                                <a href="#home" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Activity</span> </a>
                                                            </li>-->
                            <li class="tab">
                                <a href="#profile" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Profile</span> </a>
                            </li>
                            <li class="tab">
                                <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Settings</span> </a>
                            </li>
                        </ul>   
                        <div class="tab-content">
                            <div id="profile" class="row tab-pane active">
                                <div class="col-md-3">
                                    <div class="user-bg">
                                        <div class="user-content">
                                            @unless (!Auth::user())
                                            <img style="width: 100%" src="{{ url('storage/user/images/profile/'.$userFind->path_thumb)}}" class="img-responsive" alt="">
                                            @endunless
                                        </div>
                                    </div>
                                </div>
                                <div class="white-box col-md-9">
                                    <div class="tab-pane active" id="profile">
                                        <h3>{{$userFind->name}}</h3>
                                        <small>
                                            <cite title="San Francisco, USA">
                                                San Francisco, USA 
                                                <i class="glyphicon glyphicon-map-marker"></i>
                                            </cite>
                                        </small>
                                        <br /><br />
                                        <p>
                                            <i class="glyphicon glyphicon-envelope"></i> {{$userFind->username}}
                                            <br />
                                            <i class="glyphicon glyphicon-globe"></i> Not filled
                                            <br />
                                            <i class="glyphicon glyphicon-gift"></i> Not filled
                                        </p>

                                    </div>
                                </div>

                            </div>
                            <div id="settings" class="row tab-pane">
                                <div class="col-md-3">
                                    <div class="user-bg">
                                        <div class="user-content">
                                            @unless (!Auth::user())
                                            <img style="width: 100%" src="{{ url('images/profile/'.$userFind->path_thumb) }}" class="img-responsive" alt="">
                                            @endunless
                                        </div>
                                    </div>
                                </div>
                                <div class="white-box col-md-9">
                                    <div class="tab-pane active" id="settings">
                                        <form class="form-horizontal form-material">
                                            <div class="form-group">
                                                <label class="col-md-12">Username</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="{{$userFind->username}}" class="form-control form-control-line"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="{{$userFind->name}}" class="form-control form-control-line"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="{{$userFind->email}}" class="form-control form-control-line"> </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
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
