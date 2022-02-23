<?php

//Require file dẫn đường cho ajax
require_once 'path.php';

//Tồn tại phương thức post
if (isset($_POST['user_signup']) && isset($_POST['pass_signup']) && isset($_POST['pass_signup2']))
{
    //Xử ní dá chị - chỉnh chuẩn không bị injection :) 
    $user_signup = trim(htmlspecialchars(addslashes($_POST['user_signup'])));
    $pass_signup = trim(htmlspecialchars(addslashes($_POST['pass_signup'])));
    $pass_signup2 = trim(htmlspecialchars(addslashes($_POST['pass_signup2'])));

    //Nếu giá trị rỗng
    if ($user_signup == '' || $pass_signup == '' || $pass_signup2 == '')
    {
        echo 0;
    }
    //hoặc
    else
    {
        //Check tên đăng nhập
        $sql_check_user_exist = "SELECT username FROM accounts WHERE username = '$user_signup'";
        if (!$db->num_rows($sql_check_user_exist))
        {
            if ($pass_signup == $pass_signup2)
            {
                //Băm mật khẩu
                $pass_signup = md5($pass_signup);
                //Đăng ký tài khoản vào db
                $sql_create_account = "INSERT INTO `accounts` (`IDacc`, `username`, `password`, `display_name`, `email`, `status`, `phone`, `description`, `url_avatar`, `role`) VALUES (NULL, \"". $user_signup ."\", \"". $pass_signup ."\", \"". $user_signup ."\", '', '1', '', '', 'default.png', '1')";
                $db->query($sql_create_account);
                $session->send($user_signup);
                $db->close();
                echo 'Đăng ký thành công';
                new Redirect($_DOMAIN);
            }
            else
            {
                echo 2;
            }
        }
        else
        {
            echo 1;
        }
    }
}

?>