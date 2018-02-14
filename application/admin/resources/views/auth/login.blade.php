@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">Log in</div>
            <div class="panel-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <fieldset>

                        @if ($errors->has('username'))
                        <div class="alert bg-danger">
                            {{ $errors->first('username') }}
                            <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a>
                        </div>
                        @endif
                        @if ($errors->has('password'))
                        <div class="alert bg-danger">
                            {{ $errors->first('password') }}
                            <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a>
                        </div>
                        @endif
             
                        <div class="form-group {{ $errors->has('username') ? ' error_class' : '' }}">
                            <input id="email" placeholder="Username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? ' error_class' : '' }}">
                            <input id="password" placeholder="Password"  type="password" class="form-control" name="password" required>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value="Remember Me">Remember Me
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>
                        <!--                        <a class="btn float-right" href=""> Register  ?</a>-->
                    </fieldset>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->	
@endsection
