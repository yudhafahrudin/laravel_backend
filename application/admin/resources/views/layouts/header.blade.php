@section('header')
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{$title or 'Admin Backend'}}</title>

        <!-- Styles -->
        
        <link href="{{ asset('material/admin/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('material/admin/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('material/admin/css/jquery.dataTables.min.css') }}" rel="stylesheet">
        <link href="{{ asset('material/admin/css/datepicker3.css') }}" rel="stylesheet">
        <link href="{{ asset('material/admin/css/dropify.min.css') }}" rel="stylesheet">
        <link href="{{ asset('material/admin/css/styles.css') }}" rel="stylesheet">
        
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
       
    </head>
@endsection