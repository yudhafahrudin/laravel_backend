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
                    Restored Logged for <strong>{{$name}}</strong>
                </div>
                <div class="panel-body">
                    <div class="canvas-wrapper">
                        <div class="main-chart" id="line-chart" height="200" width="600">

                            <div class="card card-default">

                                <div class="card-body">
                                    <div class="panel panel-default ">
                                        <div class="panel-body timeline-container" style="display: block;">
                                            <ul class="timeline">

                                                @foreach($logCollectedEdited as $value)
                                              
                                                <li>
                                                    <div class="timeline-badge primary"><em class="glyphicon glyphicon-link"></em></div>
                                                    <div class="timeline-panel">
                                                        <div class="timeline-heading">
                                                            <h4 class="timeline-title">
                                                                Restored By {{
                                                                array_get($value,'causerUsername')
                                                                }}
                                                            </h4>
                                                        </div>
                                                        <div class="timeline-body">
                                                            detail : <br> <pre>{{print_r(array_get($value,'afterDetail'))}}</pre> <br>
                                                        </div>
                                                        <div class="timeline-heading">
                                                            <h4 class="timeline-title">
                                                                At {{
                                                                array_get($value,'time')
                                                                }}
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
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
</div>
</div>
@endsection
