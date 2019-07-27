ip = $("#head_url").data('ip');
var socket = io.connect(ip + ':8890');

// var socket2 = io.connect('172.245.55.74:8917');
// alert(socket2);
// console.log(socket2);

function ShowLoader() {
    $('#loading').fadeIn();
}

function HideLoader() {
    $('#loading').fadeOut();
}

window.addEventListener( "pageshow", function ( event ) {
  var historyTraversal = event.persisted || ( typeof window.performance != "undefined" && window.performance.navigation.type === 2 );
  if ( historyTraversal ) {
    // Handle page restore.
    window.location.reload();
  }
});

function CallAjax(ajaxurl, ajaxdata, pnlres) {
    $('#loading').fadeIn();
    $.ajax({
        method: "POST",
        url: ajaxurl,
        data: ajaxdata,
        // statusCode: {
        //     404: function () {
        //         ShowMessage('error', 'خطا در ارسال اطلاعات.لطفا اتصال اینترنت خود را بررسی کنید', 'false', 'false');
        //     }
        // }
        // ,
        success: function (data) {
            $('#loading').fadeOut();
            if (pnlres != '')
                $('#' + pnlres).html(data)
        }
    });
}

function CallAjaxFunc(ajaxurl, ajaxdata, func, failFunc) {
    $.ajax({
        method: "POST",
        url: ajaxurl,
        data: ajaxdata,
        timeout:5000,
        success: func,
        error: failFunc
    });
}

function CallAjaxImageFunc(ajaxurl, ajaxdata, func, failFunc, timeOutDelay) {
    $.ajax({
        method: "POST",
        url: ajaxurl,
        data: ajaxdata,
        contentType: false,
        processData: false,
        // statusCode: {
        //     404: function () {
        //         ShowMessage('error', 'خطا در ارسال اطلاعات.لطفا اتصال اینترنت خود را بررسی کنید', 'false', 'false');
        //     }
        // }
        // ,
        timeout:timeOutDelay,
        success: func,
        error: failFunc,
        xhr: function() {
            var xhr = new window.XMLHttpRequest();

            xhr.upload.addEventListener("progress", function(evt) {
                if (evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    percentComplete = parseInt(percentComplete * 100);
                    console.log(percentComplete);
                    $('.gallery_progress_percentage').html('%' + percentComplete);
                    if (percentComplete === 100) {
                        setTimeout(function () {
                            $('.gallery_progress_percentage').html('');
                        }, 2000);
                    }

                }
            }, false);

            return xhr;
        }
    });
}

function ShowMessage(type, msg, title, accept, reject, btns, reload) {
    $('.msgBox .bottomSide').html(msg);

    if (btns == false)
        $('.msgBox .btns').hide();

    if (type == 'success') {
        $('.msgBox').addClass('success');
        $('.msgBox').removeClass('error');
        $('.msgBox').removeClass('edit');
    } else if (type == 'error') {
        $('.msgBox').addClass('error');
        $('.msgBox').removeClass('success');
        $('.msgBox').removeClass('edit');
    } else if (type == 'edit') {
        $('.msgBox').addClass('edit');
        $('.msgBox').removeClass('error');
        $('.msgBox').removeClass('success');
    }

    /*if(type!='error')
        $('.msgBox').addClass('success');
    else  
        $('.msgBox').removeClass('success');*/

    $('.msgBox').fadeIn();

    if (title != '')
        $('.msgBox .topSide').text(title);

    if (accept != '')
        $('.msgBox .btn.confirmBtn').text(accept);

    if (reject != '')
        $('.msgBox .btn.cancelBtn').text(reject);

    if (reload == true) {
        $(document).keyup(function (e) {
            if (e.keyCode == 27) {
                $(".msgBox").fadeOut();
                location.reload();
            }
        });
        $('.msgBox .exit , .msgBox .cancelBtn').click(function () {
            $('.msgBox').fadeOut();
            // location.reload();
        });
        $('.msgBox').click(function (e) {
            if (e.target === this) {
                $('.msgBox').fadeOut();
                location.reload();
            }
            ;
        });
    } else if (reload == false) {
        $(document).keyup(function (e) {
            if (e.keyCode == 27) {
                $(".msgBox").fadeOut();
            }
        });
        $('.msgBox .exit , .msgBox .cancelBtn').click(function () {
            $('.msgBox').fadeOut();
        });
        $('.msgBox').click(function (e) {
            if (e.target === this) {
                if(!$('.cancelBtn').hasClass('cancel_underconstruction_actions')) {
                  $('.msgBox').fadeOut();
                }
            }
            ;
        });
    } else {
        $(document).keyup(function (e) {
            if (e.keyCode == 27) {
                $(".msgBox").fadeOut();
                window.location.replace("/" + reload);
            }
        });
        $('.msgBox .exit , .msgBox .cancelBtn').click(function () {
            $('.msgBox').fadeOut();
            window.location.replace("/" + reload);
        });
        $('.msgBox').click(function (e) {
            if (e.target === this) {
                $('.msgBox').fadeOut();
                window.location.replace("/" + reload);
            }
            ;
        });
    }
}

socket.on('closing_time', function (data) {
    location.reload();
});

socket.on('alert_closing_to_waiter', function (data) {
  home_url = $('#head_url').data('url')
  $(".confirmBtn").addClass("go_settings");
  ShowMessage('success', data, 'Closing Time', 'Go to setting', 'Got it', true, false);
});

$(document).on('click', '.go_settings', function () {
  location.href = home_url+"/admin/settings";
})

$(document).ready(function () {


	/* Smooth Scrollbar initialization */
	Scrollbar.initAll();

	if ( $( ".spacer" ).length ) {
		var menuHeight = $('.footer').height() + 10;
		$('.spacer').height(menuHeight);
	}

    var cardsinnerheight = $(window).height() - $('.header').height() - $('.footer').height() - 110;
    cardsinnerheight = cardsinnerheight + 'px';
    $(".cardsinner").css("min-height", cardsinnerheight);

    $(window).resize(function () {
        var cardsinnerheight = $(window).height() - $('.header').height() - $('.footer').height() - 110;
        cardsinnerheight = cardsinnerheight + 'px';
        $(".cardsinner").css("min-height", cardsinnerheight);
    });

    $(document).on('focus', '.add_item', function () {
        $(this).siblings('.add_item_btn').css('display', 'block');
    });

    $(document).on('blur', '.add_item', function () {
        $(this).siblings('.add_item_btn').hide();
    });


    function setContentHeight() {
        var contentHeight = $(window).height() - $('.header').height() - $('.footer').height() - 60;
        $('.container').height(contentHeight);
        $('.card .items').css('max-height', contentHeight - 100 + 'px');
    }

    setContentHeight();
    $(window).resize(function () {
        setContentHeight();
    });
    //
    // $('#admin_menuselection').on('change', function () {
    //     var thisEl = $(this);
    //     var chosedConn = thisEl.val();
    //     var url = thisEl.data('url');
    //     CallAjaxFunc(url, {
    //         'chosedConn': chosedConn,
    //     }, redirectCallback);
    // });

    function redirectCallback() {
        location.href = nexturl;
    }

    //Empty super license by click in LogOut
    $(document).on('click', '#empty_super_license', function () {
        ajaxUrl = $(this).data('url');
        nexturl = $(this).data('nexturl');
        CallAjaxFunc(ajaxUrl, {}, redirectCallback);
    });

    //
    version = $("#header_user_info").data('updateversion');
    if(version < 0.7) {
        update_url = $("#header_user_info").data('updateurl');
        ShowMessage('success', "سیستم بروزرسانی شد.", 'System Update', 'Ok', 'Cancel', true, false);
        $(".confirmBtn").click(function(e) {
            CallAjaxFunc(update_url, {'update_version' : 0.7}, updateVersionCallback);
        });
    }
    
    function updateVersionCallback() {
        version = 0.7;
        $('.msgBox').fadeOut();
    }
    // alert(version);
});
