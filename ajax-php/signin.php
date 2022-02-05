<?php

//Require file dẫn đường cho ajax
require_once 'path.php';

//Tồn tại phương thức post
if (isset($_POST['user_signin']) && isset($_POST['pass_signin']))
{
    //Xử ní dá chị - chỉnh chuẩn không bị injection :) 
    $user_signin = trim(htmlspecialchars(addslashes($_POST['user_signin'])));
    $pass_signin = trim(htmlspecialchars(addslashes($_POST['pass_signin'])));

    //Nếu giá trị rỗng
    if ($user_signin == '' || $pass_signin == '')
    {
        echo 0;
    }
    //hoặc
    else
    {
        //Check tên đăng nhập
        $sql_check_user_exist = "SELECT username FROM accounts WHERE username = '$user_signin'";
        if ($db->num_rows($sql_check_user_exist))
        {
            //Chuyển đổi pass sang dạng 32 ký tự mã hoá
            $pass_signin = md5($pass_signin);
            //Check pass
            $sql_check_signin = "SELECT username, password FROM accounts WHERE username = '$user_signin' AND password = '$pass_signin'";
            if ($db->num_rows($sql_check_signin))
            {
                //Check trạng thái
                $sql_check_stt = "SELECT username, password, status FROM accounts WHERE username = '$user_signin' AND password = '$pass_signin' AND status = '1'";
                if ($db->num_rows($sql_check_stt))
                {
                    $session->send($user_signin);
                    $db->close();

                    echo 4;
                    new Redirect($_DOMAIN);
                }
                else echo 3;
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