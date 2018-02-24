@section('footer')
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('material/admin/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('material/admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('material/admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('material/admin/js/dropify.min.js') }}"></script>
<script src="{{ asset('material/admin/js/jquery-confirm.js') }}"></script>
<script src="{{ asset('material/admin/js/custom.js') }}"></script>

<script type="text/javascript">
function profileAJAX(username) {
    $.ajax({
        url: "{{url('user/profile/')}}/" + username,
        dataType: 'text',
        type: 'get',
        contentType: 'application/x-www-form-urlencoded',
        data: {'username': username},
        success: function (data, textStatus, jQxhr) {
            $('.modal-body').html(data);
        },
        error: function (jqXhr, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
}

</script>

@endsection