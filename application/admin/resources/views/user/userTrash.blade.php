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
                    List of user trashed
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
                                        <!--<th>Action</th>-->
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($userAllTrashed as $value)
                                    <tr>
                                        <td>{{$listNomor++}}</td>
                                        <td>{{$value->username}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>

                                            <form action="{{ route('destroy.user',['id'=>$value->id]) }}" method="post" class="form-horizontal">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <a href="{{route('restore.user',['id'=>$value->id])}}"><span class="btn btn-info"><em class="fa fa-history"></em></span></a>
                                                <button type="submit" class="btn btn-danger" ><em class="fa fa-trash-o"></em></button>
                                            </form>

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
