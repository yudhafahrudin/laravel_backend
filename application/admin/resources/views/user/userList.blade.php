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
                    List of user registration

                    <span class="pull-right">
                        <a class="btn btn-success" href='{{route('add_user')}}'>
                            Add User
                        </a>
                    </span> 

                </div>

                <div class="panel-body">
                    <div class="canvas-wrapper">
                        <div class="main-chart" id="line-chart" height="200" width="600">
                            <table id="myTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($userAll as $value)
                                    <tr>
                                        <td>{{$listNomor++}}</td>
                                        <td>{{object_get($value, 'username')}}</td>
                                        <td>{{object_get($value, 'name')}}</td>
                                        <td>{{object_get($value, 'email')}}</td>
                                        <td>
                                            <a href="{{ route('user.profile',['username'=>object_get($value, 'username')])}}"><span class="label label-warning">Detail</span></a>
                                            <a href="{{ route('show.edit.user',['id' =>object_get($value, 'id')])}}"><span class="label label-info">Edit</span></a>

                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>	<!--/.main-->
@endsection
