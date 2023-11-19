var BootstrapDatepicker=function() {
    var t=function() {
        $("#m_datepicker_1, #m_datepicker_1_validate").datepicker( {
            todayHighlight:!0, orientation:"bottom left", templates: {
                leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>'
            }
        }
        ),
        $("#m_datepicker_1_modal").datepicker( {
            todayHighlight:!0, orientation:"bottom left", templates: {
                leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>'
            }
        }
        ),
        $("#m_datepicker_2, #m_datepicker_2_validate").datepicker( {
            todayHighlight:!0, orientation:"bottom left", templates: {
                leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>'
            }
        }
        ),
        $("#m_datepicker_2_modal").datepicker( {
            todayHighlight:!0, orientation:"bottom left", templates: {
                leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>'
            }
        }
        ),
        $("#m_datepicker_3, #m_datepicker_3_validate").datepicker( {
            todayBtn:"linked", clearBtn:!0, todayHighlight:!0, templates: {
                leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>'
            }
        }
        ),
        $("#m_datepicker_3_modal").datepicker( {
            todayBtn:"linked", clearBtn:!0, todayHighlight:!0, templates: {
                leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>'
            }
        }
        ),
        $("#m_datepicker_4_1").datepicker( {
            orientation:"top left", todayHighlight:!0, templates: {
                leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>'
            }
        }
        ),
        $("#m_datepicker_4_2").datepicker( {
            orientation:"top right", todayHighlight:!0, templates: {
                leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>'
            }
        }
        ),
        $("#m_datepicker_4_3").datepicker( {
            orientation:"bottom left", todayHighlight:!0, templates: {
                leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>'
            }
        }
        ),
        $("#m_datepicker_4_4").datepicker( {
            orientation:"bottom right", todayHighlight:!0, templates: {
                leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>'
            }
        }
        ),
        $("#m_datepicker_5").datepicker( {
            todayHighlight:!0, templates: {
                leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>'
            }
        }
        ),
        $("#m_datepicker_6").datepicker( {
            todayHighlight:!0, templates: {
                leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>'
            }
        }
        )
    }
    ;
    return {
        init:function() {
            t()
        }
    }
}

();
jQuery(document).ready(function() {
    BootstrapDatepicker.init()
}

);