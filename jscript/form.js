$_DOMAIN2 = 'http://localhost/SoundDreamer/';

//Chức năng đăng nhập
$('#formSignin button').on('click', function() {
    $this = $('formSignin button');
    $this.html('Đang tải ...');

    //Gán giá trị biến
    $user_signin = $('#formSignin #user-signin').val();
    $pass_signin = $('#formSignin #pass-signin').val();
    $alert = $('#formSignin #alert2');

    //Làm mới thông báo mỗi khi click nút đăng nhập
    $alert.css("display", "block");
    $alert.html('');

    //Nếu giá trị rỗng
    if ($user_signin == '' || $pass_signin == '') {
        $alert.css("display", "block");
        $alert.html('Vui lòng điền đủ thông tin');
        $this.html('Đăng nhập');
    } else {
        $.ajax({
            url: $_DOMAIN2 + 'signin.php',
            type: 'POST',
            data: {
                user_signin: $user_signin,
                pass_signin: $pass_signin
            },
            success: function(data) {
                switch (data) {
                    case "0":
                        {
                            $alert.html('Vui lòng điền đầy đủ thông tin');
                            break;
                        }
                    case "1":
                        {
                            $alert.html('Tên đăng nhập không tồn tại');
                            break;
                        }
                    case "2":
                        {
                            $alert.html('Sai mật khẩu!!!');
                            break;
                        }
                    case "3":
                        {
                            $alert.html('Tài khoản của bạn đã bị khoá.');
                            break;
                        }
                    case "4":
                        {
                            $alert.html('Đăng nhập thành công');
                            break;
                        }
                    default:
                        {
                            $alert.html("Xảy ra lỗi");
                            break;
                        }
                }
            },
            error: function() {
                $('#formSignin #alert2').html('Không thể đăng nhập vào lúc này, hãy thử lại sau.');
                $this.html('Đăng nhập');
            }
        })
    }
})