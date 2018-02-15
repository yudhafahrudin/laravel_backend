@extends('layouts.app')

@include('layouts.breadcumb')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    @yield('breadcumb_new')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List of categories

                    <span class="pull-right">
                        <a class="btn btn-success" href='{{route('add_categories')}}'>
                            Add Category
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
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Created By</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($categories as $value)
                                    <tr>
                                        <td>{{$listNomor++}}</td>
                                        <td>{{$value->code}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->created_by}}</td>
                                        <td>
                                            <a style="text-decoration: none" href="{{url('categories/'.$value->id)}}"><span class="label label-warning">Show</span></a>
                                            <a style="text-decoration: none" href="{{url('categories/'.$value->id).'/edit'}}"><span class="label label-info">Edit</span></a>
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
