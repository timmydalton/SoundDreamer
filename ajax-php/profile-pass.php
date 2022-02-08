<?php
//Require file dẫn đường cho ajax
require_once 'path.php';

if (isset($_POST['user_name']) && isset($_POST['pass']) && isset($_POST['repass'])) {
    //Xử lý giá trị
    $user_name = trim(htmlspecialchars(addslashes($_POST['user_name'])));
    $pass = trim(htmlspecialchars(addslashes($_POST['pass'])));
    $repass = trim(htmlspecialchars(addslashes($_POST['repass'])));

    $sql_check_user_exist = "SELECT username FROM accounts WHERE username = '$user_name'";
    if ($db->num_rows($sql_check_user_exist)) {
        //Chuyển đổi pass sang dạng 32 ký tự mã hoá
        $pass = md5($pass);
        //Check pass
        $sql_check_pass = "SELECT username, password FROM accounts WHERE username = '$user_name' AND password = '$pass'";
        if ($db->num_rows($sql_check_pass)) {
            $sql_new_pass = "UPDATE accounts SET password = '". $repass ."' WHERE username = '".$user_name."'";
            $db->query($sql_check_pass);
            $db->close();
            new Redirect('http://localhost/SoundDreamer/index.php?t=prof');
            die('Đổi mật khẩu thành công!'); //in ra thông báo
        } else {
            die('Sai mật khẩu');
        }
    } else {
        die('Tên đăng nhập không tồn tại');
    }
} else die('Error!!');
