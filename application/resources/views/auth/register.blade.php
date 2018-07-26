@extends('layouts.app')
@include('layouts.breadcumb')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        {{ Breadcrumbs::render('user.add') }}
        <br>
    </div>
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
                    Register for new user

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
                                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="username" class="col-md-2 col-form-label text-md-right">Username</label>

                                            <div class="col-md-10">
                                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                                @if ($errors->has('username'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>

                                            <div class="col-md-10">
                                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autofocus>

                                                @if ($errors->has('name'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-md-2 col-form-label text-md-right">E-Mail Address</label>

                                            <div class="col-md-10">
                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-md-2 col-form-label text-md-right">Password</label>

                                            <div class="col-md-10">
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                @if ($errors->has('password'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">Confirm Password</label>

                                            <div class="col-md-10">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-md-2 col-form-label text-md-right">Description</label>

                                            <div class="col-md-10">
                                                <textarea rows="5" id="description"  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">{{ old('description') }}</textarea>

                                                @if ($errors->has('description'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="user-image" class="col-md-2 col-form-label text-md-right">Image</label>

                                            <div class="col-md-7">
                                                <div class="imageupload">                                                    
                                                <div class="file-tab">
                                                    <img src="http://admin.indobild.app.ittron.co.id/cresenity/noimage/120/120" alt="Image preview" class="thumbnail img-responsive" >
                                                    <label class="btn btn-default btn-file">
                                                        <span>Browse</span>
                                                        <!-- The file is stored here. -->
                                                        <input type="file" name="photo">
                                                    </label>
                                                    <button type="button" class="btn btn-default">Remove</button>
                                                </div>
<!--                                                <div class="url-tab panel-body">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control hasclear" placeholder="Image URL">
                                                        <div class="input-group-btn">
                                                            <button type="button" class="btn btn-default">Submit</button>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-default">Remove</button>
                                                     The URL is stored here. 
                                                    <input type="hidden" name="image-url">
                                                </div>-->
                                            </div>
                                                <!--<input type="file" id="fine-uploader" class="form-control" name="photo">-->
                                                @if ($errors->has('photo'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('photo') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Register
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
