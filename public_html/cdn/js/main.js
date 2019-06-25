FontAwesomeConfig = { searchPseudoElements: true };
loadingImgSrc = $("#head_url").data('loadingsrc');

ip = $("#head_url").data('ip');
// var socket = io.connect(ip + ':8890');

function ShowLoader() {
    $('#loading').fadeIn();
}

function HideLoader() {
    $('#loading').fadeOut();
}

function showLoading(elem,type,loadingImg) {
	if(type==0) {
		elem.html(loadingImg);
	}
	else if(type==1) {		
		loadingImg = loadingImgSrc.replace("replace", loadingImg);
		elem.html("<img class='loading_gif' src='"+loadingImg+"'/>");
	}
}


window.addEventListener("pageshow", function (event) {
    var historyTraversal = event.persisted || ( typeof window.performance != "undefined" && window.performance.navigation.type === 2 );
    if (historyTraversal) {
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
        success: function (data) {
            $('#loading').fadeOut();
            if (pnlres != '')
                $('#' + pnlres).html(data)
        }
    });
}

function CallAjaxFunc(ajaxurl, ajaxdata, func, failFunc, timeout) {
    $.ajax({
        method: "POST",
        url: ajaxurl,
        data: ajaxdata,
        timeout: timeout,
        success: func,
        error: failFunc
    });
}

function CallAjaxImageFunc(ajaxurl, ajaxdata, func) {
    $.ajax({
        method: "POST",
        url: ajaxurl,
        data: ajaxdata,
        contentType: false,
        processData: false,
        // statusCode: {
        //     404: function() {
        //         ShowMessage('error','خطا در ارسال اطلاعات.لطفا اتصال اینترنت خود را بررسی کنید','false','false');
        //     }
        // }
        // ,
        success: func
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
        $('.msgBox').removeClass('exit');
    } else if (type == 'error') {
        $('.msgBox').addClass('error');
        $('.msgBox').removeClass('success');
        $('.msgBox').removeClass('edit');
        $('.msgBox').removeClass('exit');
    } else if (type == 'edit') {
        $('.msgBox').addClass('edit');
        $('.msgBox').removeClass('error');
        $('.msgBox').removeClass('success');
        $('.msgBox').removeClass('exit');
    } else if (type == 'exit') {
        $('.msgBox').addClass('exit');
        $('.msgBox').removeClass('edit');
        $('.msgBox').removeClass('error');
        $('.msgBox').removeClass('success');
    }


    $('.msgBox').addClass('show');

    if (title != '')
        $('.msgBox .topSide').text(title);

    if (accept != '')
        $('.msgBox .btn.confirmBtn').text(accept);

    if (reject != '')
        $('.msgBox .btn.cancelBtn').text(reject);
    else {
        $('.msgBox .btn.cancelBtn').hide();
        $('.msgBox .confirmBtn:not(.not_close)').click(function () {
            $('.msgBox').removeClass('show');
        });
    }

    if (reload == true) {
        $(document).keyup(function (e) {
            if (e.keyCode == 27) {
                $('.msgBox').removeClass('show');
                location.reload();
            }
        });
        $('.msgBox .exit , .msgBox .cancelBtn').click(function () {
            $('.msgBox').removeClass('show');
            location.reload();
        });
        $('.msgBox').click(function (e) {
            if (e.target === this) {
                $('.msgBox').removeClass('show');
                location.reload();
            }
            ;
        });
    } else if (reload == false) {
        $(document).keyup(function (e) {
            if (e.keyCode == 27) {
                $('.msgBox').removeClass('show');
            }
        });
        $('.msgBox .exit , .msgBox .cancelBtn').click(function () {
            $('.msgBox').removeClass('show');
        });
        $('.msgBox').click(function (e) {
            if (e.target === this) {
                $('.msgBox').removeClass('show');
            }
            ;
        });
    } else {
        $(document).keyup(function (e) {
            if (e.keyCode == 27) {
                $('.msgBox').removeClass('show');
                window.location.replace("/" + reload);
            }
        });
        $('.msgBox .exit , .msgBox .cancelBtn').click(function () {
            $('.msgBox').removeClass('show');
            window.location.replace("/" + reload);
        });
        $('.msgBox').click(function (e) {
            if (e.target === this) {
                $('.msgBox').removeClass('show');
                window.location.replace("/" + reload);
            }
            ;
        });
    }
}

// var myEvent = window.attachEvent || window.addEventListener;
// var chkevent = window.attachEvent ? 'onbeforeunload' : 'beforeunload'; /// make IE7, IE8 compitable
//
// myEvent(chkevent, function(e) { // For >=IE7, Chrome, Firefox
//     // var confirmationMessage = 'Are you sure to leave the page?';
//     // (e || window.event).returnValue = confirmationMessage;
//     // return confirmationMessage;
//     CallAjax("/test/test", {});
//     //            session(['temporary_user' => $user->id]);//chera tu sessione?kojaye controller estefade miShe?mage nemishod az view pass bedim?chera?
//
//     // alert(":(");
// });

$(document).ready(function () {







    /* Smooth Scrollbar initialization */
    Scrollbar.initAll();


    /* Top Icons Functions */
    $(".navicon").click(function () {
        const targetElement = document.querySelector(".mainmenu .navmenu");
		bodyScrollLock.disableBodyScroll(targetElement);
        $(".bgwrap").addClass('show');
        $(".mainmenu").addClass('activated');
    });

    $(".helpicon").click(function () {
		$(".bgwrap").trigger("click");
		bodyScrollLock.disableBodyScroll();
		$(".helpdesk").addClass('show');
		$(".helpdesk").css('border-top-left-radius', '250px');
		$(".helpdesk").append("<div class='step01'><div class='arrow'></div><div class='contentbox'>پس از انتخاب تمامی آیتم های مورد نظر، بر روی آیکون پیش نمایش سبد خرید کلیک کنید و پس از رفتن به سبد خرید، مراحل را تا نهایی کردن سفارش و پرداخت فاکتور ادامه دهید.</div></div>");
    });

    $(".helpdesk").click(function () {
        bodyScrollLock.clearAllBodyScrollLocks();
        $(".helpdesk").css('border-top-left-radius', '0px');
        $(".helpdesk").removeClass('show');
    });

    $(".shoppingcarticon").click(function () {
		bodyScrollLock.disableBodyScroll();
        $(".bgwrap").addClass('show');
        $(".shcart").addClass('activated');
    });

    // Close Anything on Black Wrap
    $(document).on('click', '.wrapclose .close, .bgwrap', function () {
        bodyScrollLock.clearAllBodyScrollLocks();
		$(".galzoom").trigger("click");
        $(".bgwrap").removeClass('show');
        $('.swiper-slide video').trigger('pause');
        $(".wrapclose").removeClass('activated');
    });

});

//show count of item which has been ordered, after refresh
function fillBasketIconCount(count) {
    if (count > 0) {

        $('.header .shoppingcarticon').addClass('notempty');
        $('.header .shoppingcarticon').html('<span>' + count + '</span>');
    }
}


/* Resize Detector */

/**
 * Copyright Marc J. Schmidt. See the LICENSE file at the top-level
 * directory of this distribution and at
 * https://github.com/marcj/css-element-queries/blob/master/LICENSE.
 */
;
(function (root, factory) {
    if (typeof define === "function" && define.amd) {
        define(factory);
    } else if (typeof exports === "object") {
        module.exports = factory();
    } else {
        root.ResizeSensor = factory();
    }
}(typeof window !== 'undefined' ? window : this, function () {

    // Make sure it does not throw in a SSR (Server Side Rendering) situation
    if (typeof window === "undefined") {
        return null;
    }
    // Only used for the dirty checking, so the event callback count is limited to max 1 call per fps per sensor.
    // In combination with the event based resize sensor this saves cpu time, because the sensor is too fast and
    // would generate too many unnecessary events.
    var requestAnimationFrame = window.requestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        function (fn) {
            return window.setTimeout(fn, 20);
        };

    /**
     * Iterate over each of the provided element(s).
     *
     * @param {HTMLElement|HTMLElement[]} elements
     * @param {Function}                  callback
     */
    function forEachElement(elements, callback) {
        var elementsType = Object.prototype.toString.call(elements);
        var isCollectionTyped = ('[object Array]' === elementsType
            || ('[object NodeList]' === elementsType)
            || ('[object HTMLCollection]' === elementsType)
            || ('[object Object]' === elementsType)
            || ('undefined' !== typeof jQuery && elements instanceof jQuery) //jquery
            || ('undefined' !== typeof Elements && elements instanceof Elements) //mootools
        );
        var i = 0, j = elements.length;
        if (isCollectionTyped) {
            for (; i < j; i++) {
                callback(elements[i]);
            }
        } else {
            callback(elements);
        }
    }

    /**
     * Get element size
     * @param {HTMLElement} element
     * @returns {Object} {width, height}
     */
    function getElementSize(element) {
        if (!element.getBoundingClientRect) {
            return {
                width: element.offsetWidth,
                height: element.offsetHeight
            }
        }

        var rect = element.getBoundingClientRect();
        return {
            width: Math.round(rect.width),
            height: Math.round(rect.height)
        }
    }

    /**
     * Class for dimension change detection.
     *
     * @param {Element|Element[]|Elements|jQuery} element
     * @param {Function} callback
     *
     * @constructor
     */
    var ResizeSensor = function (element, callback) {
        /**
         *
         * @constructor
         */
        function EventQueue() {
            var q = [];
            this.add = function (ev) {
                q.push(ev);
            };

            var i, j;
            this.call = function () {
                for (i = 0, j = q.length; i < j; i++) {
                    q[i].call();
                }
            };

            this.remove = function (ev) {
                var newQueue = [];
                for (i = 0, j = q.length; i < j; i++) {
                    if (q[i] !== ev) newQueue.push(q[i]);
                }
                q = newQueue;
            }

            this.length = function () {
                return q.length;
            }
        }

        /**
         *
         * @param {HTMLElement} element
         * @param {Function}    resized
         */
        function attachResizeEvent(element, resized) {
            if (!element) return;
            if (element.resizedAttached) {
                element.resizedAttached.add(resized);
                return;
            }

            element.resizedAttached = new EventQueue();
            element.resizedAttached.add(resized);

            element.resizeSensor = document.createElement('div');
            element.resizeSensor.dir = 'ltr';
            element.resizeSensor.className = 'resize-sensor';
            var style = 'position: absolute; left: -10px; top: -10px; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;';
            var styleChild = 'position: absolute; left: 0; top: 0; transition: 0s;';

            element.resizeSensor.style.cssText = style;
            element.resizeSensor.innerHTML =
                '<div class="resize-sensor-expand" style="' + style + '">' +
                '<div style="' + styleChild + '"></div>' +
                '</div>' +
                '<div class="resize-sensor-shrink" style="' + style + '">' +
                '<div style="' + styleChild + ' width: 200%; height: 200%"></div>' +
                '</div>';
            element.appendChild(element.resizeSensor);

            if (element.resizeSensor.offsetParent !== element) {
                element.style.position = 'relative';
            }

            var expand = element.resizeSensor.childNodes[0];
            var expandChild = expand.childNodes[0];
            var shrink = element.resizeSensor.childNodes[1];
            var dirty, rafId, newWidth, newHeight;
            var size = getElementSize(element);
            var lastWidth = size.width;
            var lastHeight = size.height;

            var reset = function () {
                expandChild.style.width = '100000px';
                expandChild.style.height = '100000px';

                expand.scrollLeft = 100000;
                expand.scrollTop = 100000;

                shrink.scrollLeft = 100000;
                shrink.scrollTop = 100000;
            };

            reset();

            var onResized = function () {
                rafId = 0;

                if (!dirty) return;

                lastWidth = newWidth;
                lastHeight = newHeight;

                if (element.resizedAttached) {
                    element.resizedAttached.call();
                }
            };

            var onScroll = function () {
                var size = getElementSize(element);
                var newWidth = size.width;
                var newHeight = size.height;
                dirty = newWidth != lastWidth || newHeight != lastHeight;

                if (dirty && !rafId) {
                    rafId = requestAnimationFrame(onResized);
                }

                reset();
            };

            var addEvent = function (el, name, cb) {
                if (el.attachEvent) {
                    el.attachEvent('on' + name, cb);
                } else {
                    el.addEventListener(name, cb);
                }
            };

            addEvent(expand, 'scroll', onScroll);
            addEvent(shrink, 'scroll', onScroll);
        }

        forEachElement(element, function (elem) {
            attachResizeEvent(elem, callback);
        });

        this.detach = function (ev) {
            ResizeSensor.detach(element, ev);
        };
    };

    ResizeSensor.detach = function (element, ev) {
        forEachElement(element, function (elem) {
            if (!elem) return;
            if (elem.resizedAttached && typeof ev == "function") {
                elem.resizedAttached.remove(ev);
                if (elem.resizedAttached.length()) return;
            }
            if (elem.resizeSensor) {
                if (elem.contains(elem.resizeSensor)) {
                    elem.removeChild(elem.resizeSensor);
                }
                delete elem.resizeSensor;
                delete elem.resizedAttached;
            }
        });
    };

    return ResizeSensor;

}));

// socket.on('redirect-under-construction', function (data) {
//   home_url = $('#head_url').data('url')
//   location.href = home_url;
// });

// socket.on('closing_time', function (data) {
//   home_url = $('#head_url').data('url')
//   $(".cancelBtn").hide();
//   ShowMessage('alert', data, 'alert', 'باشه', 'بیخیال');

//   $(body).click(function () {
//     location.href = home_url
//   })
//   setTimeout(function () {
//     location.href = home_url
//   }, 5000)
// });

// socket.on('is_open_now', function (data) {
//   home_url = $('#head_url').data('url')
//   $(".cancelBtn").hide();
//   ShowMessage('info', data, 'info', 'باشه', 'بیخیال');

//   $(body).click(function () {
//     location.href = home_url
//   })
//   setTimeout(function () {
//     location.href = home_url
//   }, 5000)
// });
