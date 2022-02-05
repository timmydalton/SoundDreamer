$_DOMAIN = 'http://localhost/SoundDreamer/';

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
            url: $_DOMAIN + 'ajax-php/signin.php',
            type: 'POST',
            data: {
                user_signin: $user_signin,
                pass_signin: $pass_signin
            },
            success: function(data) {
                switch (data) {
                    case '0':
                        {
                            $alert.html('Vui lòng điền đầy đủ thông tin');
                            break;
                        }
                    case '1':
                        {
                            $alert.html('Tên đăng nhập không tồn tại');
                            break;
                        }
                    case '2':
                        {
                            $alert.html('Sai mật khẩu!!!');
                            break;
                        }
                    case '3':
                        {
                            $alert.html('Tài khoản của bạn đã bị khoá.');
                            break;
                        }
                    case '4':
                        {
                            $alert.html('Đăng nhập thành công');
                            break;
                        }
                    default:
                        {
                            $alert.html("{" + data + "}");
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

//Upload ảnh đại diện
$('#formUpAvt').submit(function(e) {
    img_avt = $('#img_avt').val();
    $('#formUpAvt button[type=submit]').html('Loading...');

    if (img_avt) {
        //Lấy ra file
        var file_data = $('#img_avt').prop('files')[0];
        //lấy ra kiểu file
        var type = file_data.type;
        //Xét kiểu file được upload
        var match = ["image/gif", "image/png", "image/jpeg", ];
        //kiểm tra kiểu file
        if (type == match[0] || type == match[1] || type == match[2]) {
            //khởi tạo đối tượng form data
            var form_data = new FormData();
            //thêm files vào trong form data
            form_data.append('image', file_data);
            $('#formUpAvt #note').html('Sending');
            //sử dụng ajax post
            $.ajax({
                url: $_DOMAIN + 'ajax-php/profile-avt.php', // gửi đến file upload 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(res) {
                    $('#formUpAvt button[type=submit]').html('Upload');
                    $('#formUpAvt #note').html(res);
                }
            });
        }
    } else {
        $('#formUpAvt button[type=submit]').html('Upload');
        $('#formUpAvt #note').html('Vui lòng chọn tệp');
    }
});

//Xoá ảnh đại diện
$('#del_avt').on('click', function() {
    $confirm = confirm('Bạn có chắc chắn muốn xoá ảnh đại diện của mình không?');
    if ($confirm == true) {
        window.location.replace($_DOMAIN + 'ajax-php/profile-avt-del.php');
    } else {
        return false;
    }
});