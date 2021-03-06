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
                    Add Categories

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
                                    <form method="POST" action="{{ route('categories.update', ['category' => $category->id]) }}">
                                        <input name="_method" type="hidden" value="PUT">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="code" class="col-md-2 col-form-label text-md-right">Code</label>

                                            <div class="col-md-10">
                                                <input id="code" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ $category->code}}" disabled required autofocus>

                                                @if ($errors->has('code'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('code') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>

                                            <div class="col-md-10">
                                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $category->name }}" autofocus>

                                                @if ($errors->has('name'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="description" class="col-md-2 col-form-label text-md-right">Description</label>

                                            <div class="col-md-10">
                                                <textarea rows="8" id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description"> {{$category->description}}</textarea>

                                                @if ($errors->has('description'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                       

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Save 
                                                </button>
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
@endsection
