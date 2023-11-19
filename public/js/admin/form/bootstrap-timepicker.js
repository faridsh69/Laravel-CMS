var BootstrapTimepicker=function() {
    var e=function() {
        $("#m_timepicker_1, #m_timepicker_1_modal").timepicker(),
        $("#m_timepicker_2, #m_timepicker_2_modal").timepicker( {
            minuteStep: 1, showSeconds: !0, showMeridian: !1, snapToStep: !0
        }
        ),
        $("#m_timepicker_3, #m_timepicker_3_modal").timepicker( {
            defaultTime: "11:45:20 AM", minuteStep: 1, showSeconds: !0, showMeridian: !0
        }
        ),
        $("#m_timepicker_4, #m_timepicker_4_modal").timepicker( {
            defaultTime: "10:30:20 AM", minuteStep: 1, showSeconds: !0, showMeridian: !0
        }
        ),
        $("#m_timepicker_1_validate, #m_timepicker_2_validate, #m_timepicker_3_validate").timepicker( {
            minuteStep: 1, showSeconds: !0, showMeridian: !1, snapToStep: !0
        }
        )
    }
    ;
    return {
        init:function() {
            e()
        }
    }
}

();
jQuery(document).ready(function() {
    BootstrapTimepicker.init()
}

);