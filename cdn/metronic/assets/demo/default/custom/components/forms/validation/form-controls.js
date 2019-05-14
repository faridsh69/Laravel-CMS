var FormControls=function() {
    var e=function() {
        $("#m_form_1").validate( {
            rules: {
                email: {
                    required: true, email: true
                }
                , url: {
                    required: true
                }
                , digits: {
                    required: true, digits: true
                }
                , creditcard: {
                    required: true, creditcard: true
                }
                , phone: {
                    required: true, phoneUS: true
                }
                , option: {
                    required: true
                }
                , options: {
                    required: true, minlength: 2, maxlength: 4
                }
                , memo: {
                    required: true, minlength: 10, maxlength: 100
                }
                , checkbox: {
                    required: true
                }
                , checkboxes: {
                    required: true, minlength: 1, maxlength: 2
                }
                , radio: {
                    required: true
                }
            }
            , invalidHandler:function(e, r) {
                var i=$("#m_form_1_msg");
                i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
            }
            , submitHandler:function(e) {}
        }
        )
    }
    ,
    r=function() {
        $("#m_form_2").validate( {
            rules: {
                email: {
                    required: true, email: true
                }
                , url: {
                    required: true
                }
                , digits: {
                    required: true, digits: true
                }
                , creditcard: {
                    required: true, creditcard: true
                }
                , phone: {
                    required: true, phoneUS: true
                }
                , option: {
                    required: true
                }
                , options: {
                    required: true, minlength: 2, maxlength: 4
                }
                , memo: {
                    required: true, minlength: 10, maxlength: 100
                }
                , checkbox: {
                    required: true
                }
                , checkboxes: {
                    required: true, minlength: 1, maxlength: 2
                }
                , radio: {
                    required: true
                }
            }
            , invalidHandler:function(e, r) {
                var i=$("#m_form_2_msg");
                i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
            }
            , submitHandler:function(e) {}
        }
        )
    }
    ;
    return {
        init:function() {
            e(),
            r()
        }
    }
}

();
jQuery(document).ready(function() {
    FormControls.init()
}

);