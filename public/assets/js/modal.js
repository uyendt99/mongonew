$('.multiple_select').select2();
$('.show_confirm').click(function(e) {
    if(!confirm('Bạn chắc chắn muốn xóa dữ liệu này?')) {
        e.preventDefault();
    }
});
if ($("#quickForm").length > 0) {
    $("#quickForm").validate({

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
                required: "Please enter name",
            },
            total_price: {
                required: "Please enter message",
            }

        },
    })
} 
