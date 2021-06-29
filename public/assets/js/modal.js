$('.multiple_select').select2();
$('.show_confirm').click(function(e) {
    if(!confirm('Bạn chắc chắn muốn xóa dữ liệu này?')) {
        e.preventDefault();
    }
});
var url = window.location;

// for sidebar menu entirely but not cover treeview
$('ul.nav-sidebar a').filter(function() {
    return this.href == url;
}).addClass('active');

// for treeview
$('ul.nav-treeview a').filter(function() {
    return this.href == url;
}).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');

jQuery.validator.addMethod('valid_phone', function (value) {
    var regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
    return value.trim().match(regex);
  });


if ($("#createOrder").length > 0) {
    $("#createOrder").validate({

        rules: {
            name: {
                required: true,
                maxlength: 50
            },

            total_price: {
                required: true,
            },

        },
        messages: {

            name: {
                required: "Vui lòng nhập tên đơn hàng",
            },
            total_price: {
                required: "Vui lòng nhập giá tiền",
            }

        },
    })
}
if ($("#updateOrder").length > 0) {
    $("#updateOrder").validate({

        rules: {
            name: {
                required: true,
                maxlength: 50
            },

            total_price: {
                required: true,
            },

        },
        messages: {

            name: {
                required: "Vui lòng nhập tên đơn hàng",
            },
            total_price: {
                required: "Vui lòng nhập giá tiền",
            }

        },
    })
}
if ($("#createCustomer").length > 0){
    $("#createCustomer").validate({
        rules: {
            name: {
                required: true,
            },

            age: {
                required: true,
                number: true,
                min: 1
            },
            gender: {
                required: true
            },
            phone: {
                required: true,
                valid_phone: true,
            },
            email: {
                required: true,
                email:true
            },
            address: {
                required: true
            },
            "classify[]": {
                required: true
            },
            company_id: {
                required: true
            },
            job: {
                required: true
            },
            "user_ids[]": {
                required: true
            },


        },
        messages: {

            name: {
                required: "Vui lòng nhập tên",
            },
            age: {
                required: "Vui lòng nhập tuổi",
                number: "Tuổi phải là dạng số",
                min: "Tuổi phải là số lớn hơn 0"
            },
            gender: {
                required: "Vui lòng chọn giới tính"
            },
            phone: {
                required: "Vui lòng nhập số điện thoại",
                valid_phone: "Số điện thoại của bạn không đúng định dạng"
            },
            email: {
                required: "Vui lòng nhập địa chỉ email",
                email:"Định dạng email không đúng"
            },
            address: {
                required: "Vui lòng nhập địa chỉ"
            },
            "classify[]": {
                required: "Vui lòng chọn loại khách hàng"
            },
            company_id: {
                required: "Vui lòng chọn nơi làm việc"
            },
            job: {
                required: "Vui lòng nhập nghề nghiệp"
            },
            "user_ids[]": {
                required: "Vui lòng chọn nhân viên chăm sóc"
            }

        },
        errorPlacement: function(error, element)
        {
            if ( element.is(":radio") )
            {
                error.appendTo( element.parents('.radio_gender') );
            }
            else
            { // This is the default behavior
                error.insertAfter( element );
            }
         }
    })
}
if ($("#updateCustomer").length > 0){
    $("#updateCustomer").validate({
        rules: {
            name: {
                required: true,
            },

            age: {
                required: true,
                number: true,
                min: 1
            },

            phone: {
                required: true,
                valid_phone: true,
            },
            email: {
                required: true,
                email:true
            },
            address: {
                required: true
            },
            "classify[]": {
                required: true
            },
            company_id: {
                required: true
            },
            job: {
                required: true
            },
            "user_ids[]": {
                required: true
            },


        },
        messages: {

            name: {
                required: "Vui lòng nhập tên",
            },
            age: {
                required: "Vui lòng nhập tuổi",
                number: "Tuổi phải là dạng số",
                min: "Tuổi phải là số lớn hơn 0"
            },
            phone: {
                required: "Vui lòng nhập số điện thoại",
                valid_phone: "Số điện thoại của bạn không đúng định dạng"
            },
            email: {
                required: "Vui lòng nhập địa chỉ email",
                email:"Định dạng email không đúng"
            },
            address: {
                required: "Vui lòng nhập địa chỉ"
            },
            "classify[]": {
                required: "Vui lòng chọn loại khách hàng"
            },
            company_id: {
                required: "Vui lòng chọn nơi làm việc"
            },
            job: {
                required: "Vui lòng nhập nghề nghiệp"
            },
            "user_ids[]": {
                required: "Vui lòng chọn nhân viên chăm sóc"
            }

        },
        errorPlacement: function(error, element)
        {
            if ( element.is(":radio") )
            {
                error.appendTo( element.parents('.radio_gender') );
            }
            else
            { // This is the default behavior
                error.insertAfter( element );
            }
         }
    })
}
if ($("#register").length > 0) {
    $("#register").validate({

        rules: {
            name: {
                required: true,
            },

            username: {
                required: true,
            },
            email: {
                required: true,
                email:true
            },
            password: {
                required: true,
                minlength:6
            },
            cfm_password: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {

            name: {
                required: "Vui lòng nhập tên",
            },
            username: {
                required: "Vui lòng nhập tên đăng nhập",
            },
            email: {
                required: "Vui lòng nhập email",
                email: "Định dạng email không đúng"
            },
            password: {
                required: "Vui lòng nhập mật khẩu",
                minlength: "Password ít nhất 6 ký tự"
            },
            cfm_password: {
                required: "Vui lòng xác nhận mật khẩu",
                equalTo: "Xác nhận mật khẩu không đúng"
            }

        },
    })
}
if ($("#login").length > 0) {
    $("#login").validate({

        rules: {
            email: {
                required: true,
                email:true
            },
            password: {
                required: true,
                minlength:6
            }
        },
        messages: {

            email: {
                required: "Vui lòng nhập email",
                email: "Định dạng email không đúng"
            },
            password: {
                required: "Vui lòng nhập mật khẩu",
                minlength: "Password ít nhất 6 ký tự"
            }

        },
    })
}
if ($("#createRole").length > 0) {
    $("#createRole").validate({

        rules: {
            name: {
                required: true,
                maxlength: 50
            },

            "permission_ids[]": {
                required: true,
            },

        },
        messages: {

            name: {
                required: "Vui lòng nhập tên vai trò",
            },
            "permission_ids[]": {
                required: "Vui lòng chọn quyền",
            }

        },
    })
}
if ($("#updateRole").length > 0) {
    $("#updateRole").validate({

        rules: {
            name: {
                required: true,
                maxlength: 50
            },

            "permission_ids[]": {
                required: true,
            },

        },
        messages: {

            name: {
                required: "Vui lòng nhập tên vai trò",
            },
            "permission_ids[]": {
                required: "Vui lòng chọn quyền",
            }

        },
    })
}
if ($("#createPermission").length > 0) {
    $("#createPermission").validate({

        rules: {
            name: {
                required: true,
                maxlength: 50
            },

            display_name: {
                required: true,
            },

        },
        messages: {

            name: {
                required: "Vui lòng nhập tên quyền",
            },
            display_name: {
                required: "Vui lòng nhập tên quyền hiển thị",
            }

        },
    })
}
if ($("#updatePermission").length > 0) {
    $("#updatePermission").validate({

        rules: {
            name: {
                required: true,
                maxlength: 50
            },

            display_name: {
                required: true,
            },

        },
        messages: {

            name: {
                required: "Vui lòng nhập tên quyền",
            },
            display_name: {
                required: "Vui lòng nhập tên quyền hiển thị",
            }

        },
    })
}
if ($("#createUser").length > 0) {
    $("#createUser").validate({

        rules: {
            name: {
                required: true,
            },

            username: {
                required: true,
            },
            email: {
                required: true,
                email:true
            },
            password: {
                required: true,
                minlength:6
            },
            "role_ids[]": {
                required : true,
            }
        },
        messages: {

            name: {
                required: "Vui lòng nhập tên",
            },
            username: {
                required: "Vui lòng nhập tên đăng nhập",
            },
            email: {
                required: "Vui lòng nhập email",
                email: "Định dạng email không đúng"
            },
            password: {
                required: "Vui lòng nhập mật khẩu",
                minlength: "Password ít nhất 6 ký tự"
            },
            "role_ids[]": {
                required: "Vui lòng chọn vai trò",
            }

        },
    })
}
if ($("#updateUser").length > 0) {
    $("#updateUser").validate({

        rules: {
            name: {
                required: true,
            },

            username: {
                required: true,
            },
            email: {
                required: true,
                email:true
            },
            password: {
                required: true,
                minlength:6
            },
            "role_ids[]": {
                required : true,
            }
        },
        messages: {

            name: {
                required: "Vui lòng nhập tên",
            },
            username: {
                required: "Vui lòng nhập tên đăng nhập",
            },
            email: {
                required: "Vui lòng nhập email",
                email: "Định dạng email không đúng"
            },
            password: {
                required: "Vui lòng nhập mật khẩu",
                minlength: "Password ít nhất 6 ký tự"
            },
            "role_ids[]": {
                required: "Vui lòng chọn vai trò",
            }

        },
    })
}
if ($("#import").length > 0) {
    $("#import").validate({

        rules: {
            file: {
                required: true,
                extension: "xls|xlsx",
            }

        },
        messages: {

            file: {
                required: "Vui lòng chọn file",
                extension: "File không đúng định dạng phải là .xls hoặc xlsx."
            },

        },
    })
}
if ($("#createCompany").length > 0) {
    $("#createCompany").validate({

        rules: {
            name: {
                required: true,
            },

        },
        messages: {

            name: {
                required: "Vui lòng nhập tên công ty",
            },

        },
    })
}
if ($("#updateCompany").length > 0) {
    $("#updateCompany").validate({

        rules: {
            name: {
                required: true,
            },

        },
        messages: {

            name: {
                required: "Vui lòng nhập tên công ty",
            },

        },
    })
}

$(document).ready(function(){
    $('#example1').DataTable({
        "ordering": false,
        "bInfo": false,
        "oLanguage": {
            "sLengthMenu": "Hiển thị _MENU_ bản ghi",
            "sSearch": "Tìm kiếm:"
        }
    });
        
    $( "input[type=search]" ).addClass("form-control form-control-sm");
});

$("#checkAll").click(function () {
    $('input:checkbox').not(this).prop('checked', this.checked);
});
