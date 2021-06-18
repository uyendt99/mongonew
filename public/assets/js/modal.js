$('.multiple_select').select2();
$('.show_confirm').click(function(e) {
    if(!confirm('Bạn chắc chắn muốn xóa dữ liệu này?')) {
        e.preventDefault();
    }
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
