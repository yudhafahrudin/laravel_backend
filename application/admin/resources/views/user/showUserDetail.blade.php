@extends('layouts.app')
@include('layouts.breadcumb')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    @yield('breadcumb')
    <div class="row">
        <div class="col-md-12">

            @if(session()->has('message'))
            <div class="alert bg-success">
                {{ session()->get('message') }}
                <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a>
            </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">
                    Detail User

                    <span class="pull-right">
                        <a class="btn btn-success" href='{{route('show.user')}}'>
                            List User
                        </a>
                    </span> 
                </div>
                <div class="panel-body">
                    <div class="canvas-wrapper">
                        <div class="main-chart" id="line-chart" height="200" width="600">

                            <div class="card card-default">

                                <div class="card-body">
                                    <div class="col-md-2 text-md-right">Username</div>
                                    <div class="col-md-10 text-md-right">{{$userFind->username}}</div>
                                    <div class="col-md-2 text-md-right">Name</div>
                                    <div class="col-md-10 text-md-right">{{$userFind->name}}</div>
                                    <div class="col-md-2 text-md-right">Email</div>
                                    <div class="col-md-10 text-md-right">{{$userFind->email}}</div>
                                    <div class="col-md-12 text-md-right"> 
                                        <br>
                                        <form action="{{ route('delete.user',['user' => $userFind->id]) }}" method="post" class="form-horizontal">
                                            @csrf
                                            <a href="{{ route('show.edit.user',['id' =>$userFind->id])}}" class="btn btn-info"> Edit </a> 
                                            <input type="submit" class="btn btn-danger" value="Delete">
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
