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
                    List of last updated 

                </div>

                <div class="panel-body">
                    <div class="canvas-wrapper">
                        <div class="main-chart" id="line-chart" height="200" width="600">
                            <table id="myTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Type</th>
                                        <th>Name</th>
                                        <th>Deleted By</th>
                                        <th>Deleted At</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($logsCollected as $value)
                                    <tr>
                                        <td>{{$listNomor++}}</td>
                                        <td>{{
                                            array_get($value,'type')
                                            }}
                                        </td>
                                        <td>{{
                                            array_get($value,'subjectName')
                                            }}
                                        </td>
                                        <td>{{
                                            array_get($value,'causerUsernmae')
                                            }}
                                        </td>
                                        <td>{{
                                            array_get($value, 'time')
                                            }}
                                        </td>
                                        <td>
                                            <a href="{{route('logs.detail.deleted',['id'=>array_get($value,'id')])}}" class="label label-info"> Detail </a>
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
