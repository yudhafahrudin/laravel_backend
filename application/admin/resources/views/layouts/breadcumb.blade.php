@section('breadcumb')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
        <li class="active">Dashboard</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-4 ">
        <h1 class="page-header">{{$title or 'Dashboard'}}</h1>
        
    </div>
    <div class="col-lg-8 no-padding">
        
        <div class="col-xs-4 col-md-2 col-lg-2 no-padding"> 
        <h3 class="page-header">Statistic : </h3>
        </div>
        <div class="col-xs-4 col-md-5 col-lg-5 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding">
							<div class="large">7</div>
							<div class="text-muted">User New</div>
						</div>
					</div>
				</div>
        <div class="col-xs-4 col-md-5 col-lg-5 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding">
							<div class="large">7</div>
							<div class="text-muted">User</div>
						</div>
					</div>
				</div>
    
    </div>
</div><!--/.row-->
@endsection