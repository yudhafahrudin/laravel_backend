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
    <!--<link href="{{ asset('material/admin/css/jquery.dataTables.min.css') }}" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
    <link href="{{ asset('material/admin/css/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('material/admin/css/jquery-confirm.css') }}" rel="stylesheet">
    <link href="{{ asset('material/admin/css/bootstrap-imageupload.min.css') }}" rel="stylesheet">
    <link href="{{ asset('material/admin/css/jquery.loading.min.css') }}" rel="stylesheet">
    <link href="{{ asset('material/admin/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.css">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <script src="{{ asset('material/admin/js/jquery-3.3.1.min.js') }}"></script>

</head>
@endsection