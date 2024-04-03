$(document).ready(function () {
    // Đăng ký
    $('#register_ctr').click(function (e) {
        e.preventDefault(); // Ngăn chặn mặc định hành vi của liên kết
        $.ajax({
            type: 'GET',
            url: '/?url=register', // Chuyển hướng sang /register
            success: function(response) {
                // Xử lý phản hồi nếu cần
                console.log(response);
            },
            error: function(error) {
                // Xử lý lỗi nếu cần
                console.log(error);
            }
        });
    });
});
