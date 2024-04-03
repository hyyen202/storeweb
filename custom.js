
    $(document).ready(function () {
        // Đăng nhập
        $('#login').click(function (e) {
            // Ngăn không cho load lại trang
            e.preventDefault();
            //Lấy giá trị của 2 ô input
            let email = $('#email').val(),
                password = $('#password').val();
                
            // Gửi request 
            $.ajax({
                url: '../src/Admin/views/authenticate/action.php?act=login',
                type: 'POST',
                data: {
                    email,
                    password
                },
                      // Nếu thành công thì hiển thị kết quả ra trình duyệt
                success: function (response) {
                    let res = JSON.parse(response);
                    $('#result').html(`<div class="alert alert-${res.type}" role="alert">${res.message}</div>`);
                    $('#result').fadeIn('slow', function(){
                        $('#result').delay(5000).fadeOut();
                    });
                    if(res.type == "success"){
                        $("#login_form")[0].reset();
                        window.setTimeout(function(){
                            //Chuyển trang qua trang chủ
                            window.location.href = "/store/quanly/";
                        }, 1500);
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
        // Đăng ký
        
    });

