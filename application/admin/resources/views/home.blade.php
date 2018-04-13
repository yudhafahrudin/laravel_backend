@extends('layouts.app')

@include('layouts.breadcumb')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	
                @yield('breadcumb')
                
                <div class="row">
                <div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Blank Section
						
						</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
                    </div>
	</div>	<!--/.main-->
@endsection
