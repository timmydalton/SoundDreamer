<?php

//Thông tin chung
$_DOMAIN = 'http://localhost/SoundDreamer/';
$_PATH = substr(__DIR__,0,-4);

//Require các thư viện php
require_once $_PATH.'classes/DB.php';
require_once $_PATH.'classes/Session.php';
require_once $_PATH.'classes/Function.php';

//Kết nối database
$db = new DB();
$db->connect();
$db->set_char('utf8');

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

//Lấy ngày tháng hiện tại
$date_curr = '';
$date_curr = date("Y-m-d H:i:s a");
$day_curr = substr($date_curr, 8, 2);
$month_curr = substr($date_curr, 5, 2);
$year_curr = substr($date_curr, 0, 4);

?>