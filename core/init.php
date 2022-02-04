<?php

//Require các thư viện php
require_once 'classes/DB.php';
require_once 'classes/Session.php';
require_once 'classes/Function.php';

//Kết nối database
$db = new DB();
$db->connect();
$db->set_char('utf8');

//Thông tin chung
$_DOMAIN = 'http://localhost/SoundDreamer/index.php';
$_DOMAIN2 = 'http://localhost/SoundDreamer/';

//Khởi tạo session
$session = new Session();
$session->start();

//Kiểm tra session
if ($session->get() != '')
{
    $user = $session->get();
}
else
{
    $user = '';
}

//Biến điều hướng
if(isset($_GET['t']))
{
    $tab = $_GET['t'];
}
else
{
    $tab = 'home';
}

//Kiểm tra trạng thái đăng nhập
if ($user)
{
    //Lấy dữ liệu
    $sql_get_data_user = "SELECT * FROM accounts WHERE username = '$user'";
    if ($db->num_rows($sql_get_data_user))
    {
        $data_user = $db->fetch_assoc($sql_get_data_user, 1);
    }
}

?>