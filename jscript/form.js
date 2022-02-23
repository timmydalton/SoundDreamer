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
                    default:
                        {
                            $alert.html(data);
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
});

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
        var match = ["image/png", "image/jpeg", ];
        //kiểm tra kiểu file
        if (type == match[0] || type == match[1]) {
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

//Cập nhật thông tin cá nhân
$('#formInfo').submit(function(e) {
    $alert = $('#formInfo #alertInfo');
    $alert.html('Loading...');
    $display_name = '' + $('#formInfo #display_name').val();
    $email = '' + $('#formInfo #email').val();
    $phone = '' + $('#formInfo #phone').val();
    $des = '' + $('#formInfo #des').val();
    $action = 'updateInfo';
    $.ajax({
        url: $_DOMAIN + 'ajax-php/profile-info.php',
        type: 'POST',
        data: {
            action: $action,
            display_name: $display_name,
            email: $email,
            phone: $phone,
            des: $des
        },
        success: function(data) {
            $alert.html(data);
        },
        error: function() {
            $alert.html('Xảy ra lỗi !')
        }
    });
});

//Thay đổi mật khẩu
$('#formPass').submit(function(e) {
    $alert = $('#formPass #alertPass');
    $alert.html('Loading...');
    $user_name = $('#formPass #pro-user').val();
    $pass = $('#formPass #pro-pass').val();
    $repass = $('#formPass #pro-repass').val();
    $repass2 = $('#formPass #pro-repass2').val();
    if ($user_name == '' || $pass == '' || $repass == '' || $repass2 == '') {
        $alert.html('Hãy nhập đủ thông tin');
    } else {
        if ($repass == $repass2) {
            $.ajax({
                url: $_DOMAIN + 'ajax-php/profile-pass.php',
                type: 'POST',
                data: {
                    user_name: $user_name,
                    pass: $pass,
                    repass: $repass
                },
                success: function(result) {
                    alert(result);
                    $alert.html(result);
                },
                error: function() {
                    alert('Xảy ra lỗi');
                }
            });
        } else {
            $alert.html('Nhập lại mật khẩu không trùng khớp...');
        }
    }
});

//Tải file audio lên server
$('#formUpAudio').submit(function(e) {
    $alert = $('#formUpAudio #alert');
    $alert.html('Loading...');
    //Lấy source audio
    $audio = $('#up-audio').val();
    if ($audio) {
        //Lấy source ảnh cover
        $cover = $('#up-cover').val();
        if ($cover) {
            $song_name = $('#up-song-title').val();
            $song_singer = $('#up-song-singer').val();
            $song_lyrics = $('#up-song-lyrics').val();
            if ($song_name && $song_singer && $song_lyrics) {
                //Lấy ra file audio
                var data_audio = $('#up-audio').prop('files')[0];
                if (data_audio.type == 'audio/mpeg') {
                    //Lấy ra file ảnh cover ||"image/gif", "image/png", "image/jpeg"||
                    var data_cover = $('#up-cover').prop('files')[0];
                    if (data_cover.type == 'image/gif' || data_cover.type == 'image/png' || data_cover.type == 'image/jpeg') {
                        //Khởi tạo form
                        var form_audio = new FormData();
                        //Thêm dữ liệu zô
                        form_audio.append('audio', data_audio);
                        form_audio.append('cover', data_cover);
                        form_audio.append('title', $song_name);
                        form_audio.append('singer', $song_singer);
                        form_audio.append('lyrics', $song_lyrics);
                        $.ajax({
                            url: $_DOMAIN + 'ajax-php/up-audio.php', // gửi đến file upload 
                            dataType: 'text',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_audio,
                            type: 'post',
                            success: function(res) {
                                alert('Đăng tải nhạc thành công, bạn sẽ được chuyển hướng về trang chủ...');
                                $alert.html(res);
                            }
                        })
                    } else {
                        $alert.html('File ảnh cover không phải là ảnh :) !');
                    }
                } else {
                    $alert.html('File nhạc không phải là mp3!');
                }
            } else {
                $alert.html('Bạn chưa nhập đủ thông tin!');
            }
        } else {
            $alert.html('Bạn chưa chọn file ảnh cover!');
        }
    } else {
        $alert.html('Bạn chưa chọn file nhạc!');
    }
});

//Chức năng đăng ký
$('#formSignup button').on('click', function() {
    $this = $('formSignup button');
    $this.html('Đang tải ...');

    //Gán giá trị biến
    $user_signup = $('#formSignup #user-signup').val();
    $pass_signup = $('#formSignup #pass-signup').val();
    $pass_signup2 = $('#formSignup #pass-signup2').val();
    $alert = $('#formSignup #alert2');

    //Làm mới thông báo mỗi khi click nút đăng nhập
    $alert.css("display", "block");
    $alert.html('');

    //Nếu giá trị rỗng
    if ($user_signup == '' || $pass_signup == '' || $pass_signup2 == '') {
        $alert.css("display", "block");
        $alert.html('Vui lòng điền đủ thông tin');
        $this.html('Đăng nhập');
    } else if ($pass_signup != $pass_signup2) {
        $alert.html('Mật khẩu không trùng khớp...');
    } else {
        $.ajax({
            url: $_DOMAIN + 'ajax-php/signup.php',
            type: 'POST',
            data: {
                user_signup: $user_signup,
                pass_signup: $pass_signup,
                pass_signup2: $pass_signup2,
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
                            $alert.html('Tên đăng nhập đã tồn tại');
                            break;
                        }
                    case '2':
                        {
                            $alert.html('Mật khẩu nhập không khớp nhau');
                            break;
                        }
                    default:
                        {
                            $alert.html(data);
                            break;
                        }
                }
            },
            error: function() {
                $alert.html('Không thể đăng ký vào lúc này, hãy thử lại sau.');
                $this.html('Đăng nhập');
            }
        })
    }
});

//Chức năng bình luận
$('button#submit').on('click', function() {
    $IDSong = $('#IDSong').text();
    $IDacc = $('#IDacc').text();
    $data = $('#cmt-data').val();
    $date = $('#date').text();
    if (!$data) {
        alert("Bạn chưa nhập comments");
    } else {
        $.ajax({
            url: $_DOMAIN + 'ajax-php/upcmt.php',
            type: 'POST',
            data: {
                IDSong: $IDSong,
                IDacc: $IDacc,
                data: $data,
                date: $date
            },
            success: function(data) {
                if (data != '1') {
                    alert(data);
                };
                getCmtData();
                $('cmt-data').text(' ');
            }
        });
    }
});

//Lấy show cmt bằng ajax
$('button#show-comments').on('click', getCmtData);