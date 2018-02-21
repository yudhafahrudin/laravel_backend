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
                    Detail Categories

                    <span class="pull-right">
                        <a class="btn btn-success" href='{{url('categories')}}'>
                            List Categories
                        </a>
                    </span> 
                </div>
                <div class="panel-body">
                    <div class="canvas-wrapper">
                        <div class="main-chart" id="line-chart" height="200" width="600">

                            <div class="card card-default">

                                <div class="card-body">
                                    <div class="col-md-2 text-md-right">Code</div>
                                    <div class="col-md-10 text-md-right">{{$category->code}}</div>
                                    <div class="col-md-2 text-md-right">Name</div>
                                    <div class="col-md-10 text-md-right">{{$category->name}}</div>
                                    <div class="col-md-2 text-md-right">Description</div>
                                    <div class="col-md-10 text-md-right">{{$category->description}}</div>
                                    <div class="col-md-2 text-md-right">Created By</div>
                                    <div class="col-md-10 text-md-right">{{$category->created_by}}</div>
                                    <div class="col-md-12 text-md-right"> 
                                        <br>
                                        <form action="{{ route('categories.delete',['categories' => $category->id]) }}" method="post" class="form-horizontal">
                                            @csrf
                                            <a href="{{url('categories/'.$category->id.'/edit')}}" class="btn btn-info"> Edit </a> 
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
