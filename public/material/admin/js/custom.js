(window.jQuery);
$(window).on('resize', function () {
    if ($(window).width() > 768)
        $('#sidebar-collapse').collapse('show')
})
$(window).on('resize', function () {
    if ($(window).width() <= 767)
        $('#sidebar-collapse').collapse('hide')
})
$(document).on('click', '.panel-heading span.clickable', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('em').removeClass('fa-toggle-up').addClass('fa-toggle-down');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('em').removeClass('fa-toggle-down').addClass('fa-toggle-up');
    }
})

// Set header CSRF
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

// Notification message
 function notifyMessage(type, message) {
        $.notify(
                message,
                {position: "top center", className: type}
        );
    }
    
// Image BOX for upload
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
    
// Modal
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })

    