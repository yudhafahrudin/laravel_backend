@section('footer')
<script type="text/template" id="qq-template-gallery">
    <div class="qq-uploader-selector qq-uploader qq-gallery" qq-drop-area-text="Drop files here">
    <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
    <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
    </div>
    <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
    <span class="qq-upload-drop-area-text-selector"></span>
    </div>
    <div class="qq-upload-button-selector qq-upload-button">
    <div>Upload a file</div>
    </div>
    <span class="qq-drop-processing-selector qq-drop-processing">
    <span>Processing dropped files...</span>
    <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
    </span>
    <ul class="qq-upload-list-selector qq-upload-list" role="region" aria-live="polite" aria-relevant="additions removals">
    <li>
    <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
    <div class="qq-progress-bar-container-selector qq-progress-bar-container">
    <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
    </div>
    <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
    <div class="qq-thumbnail-wrapper">
    <img class="qq-thumbnail-selector" qq-max-size="120" qq-server-scale>
    </div>
    <button type="button" class="qq-upload-cancel-selector qq-upload-cancel">X</button>
    <button type="button" class="qq-upload-retry-selector qq-upload-retry">
    <span class="qq-btn qq-retry-icon" aria-label="Retry"></span>
    Retry
    </button>

    <div class="qq-file-info">
    <div class="qq-file-name">
    <span class="qq-upload-file-selector qq-upload-file"></span>
    <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
    </div>
    <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
    <span class="qq-upload-size-selector qq-upload-size"></span>
    <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">
    <span class="qq-btn qq-delete-icon" aria-label="Delete"></span>
    </button>
    <button type="button" class="qq-btn qq-upload-pause-selector qq-upload-pause">
    <span class="qq-btn qq-pause-icon" aria-label="Pause"></span>
    </button>
    <button type="button" class="qq-btn qq-upload-continue-selector qq-upload-continue">
    <span class="qq-btn qq-continue-icon" aria-label="Continue"></span>
    </button>
    </div>
    </li>
    </ul>

    <dialog class="qq-alert-dialog-selector">
    <div class="qq-dialog-message-selector"></div>
    <div class="qq-dialog-buttons">
    <button type="button" class="qq-cancel-button-selector">Close</button>
    </div>
    </dialog>

    <dialog class="qq-confirm-dialog-selector">
    <div class="qq-dialog-message-selector"></div>
    <div class="qq-dialog-buttons">
    <button type="button" class="qq-cancel-button-selector">No</button>
    <button type="button" class="qq-ok-button-selector">Yes</button>
    </div>
    </dialog>

    <dialog class="qq-prompt-dialog-selector">
    <div class="qq-dialog-message-selector"></div>
    <input type="text">
    <div class="qq-dialog-buttons">
    <button type="button" class="qq-cancel-button-selector">Cancel</button>
    <button type="button" class="qq-ok-button-selector">Ok</button>
    </div>
    </dialog>
    </div>
</script>


<!-- Scripts -->
<!--<script src="{{ asset('js/app.js') }}"></script>-->
<script src="{{ asset('material/admin/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('material/admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('material/admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('material/admin/js/jquery-confirm.js') }}"></script>
<script src="{{ asset('material/admin/js/bootstrap-imageupload.min.js') }}"></script>
<script src="{{ asset('material/admin/js/notify.js') }}"></script>
<script src="{{ asset('material/admin/js/jquery.loading.min.js') }}"></script>
<script src="{{ asset('material/admin/js/custom.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.js"></script>


<script type="text/javascript">
function profileAJAX(username) {
    $.ajax({
        url: "{{url('users/profile/')}}/" + username,
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

$(document).ready(function () {
    $('#myTable').DataTable();
});
$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').focus()
})
</script>


<script>
    var $imageupload = $('.imageupload');
    $imageupload.imageupload();

    $('#imageupload-disable').on('click', function () {
        $imageupload.imageupload('disable');
        $(this).blur();
    })

    $('#imageupload-enable').on('click', function () {
        $imageupload.imageupload('enable');
        $(this).blur();
    })

    $('#imageupload-reset').on('click', function () {
        $imageupload.imageupload('reset');
        $(this).blur();
    });
</script>

<script>
    function notifyMessage(type, message) {
        $.notify(
                message,
                {position: "top center", className: type}
        );
    }
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@endsection