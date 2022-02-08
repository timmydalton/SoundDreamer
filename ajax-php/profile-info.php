<?php

//Require file dẫn đường cho ajax
require_once 'path.php';

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'updateInfo') {
        //Lấy thông tin
        $name = trim(htmlspecialchars(addslashes($_POST['display_name'])));
        $email = trim(htmlspecialchars(addslashes($_POST['email'])));
        $phone = trim(htmlspecialchars(addslashes($_POST['phone'])));
        $des = trim(htmlspecialchars(addslashes($_POST['des'])));
        //Tạo câu lệnh sql
        $sql_update_info = "UPDATE accounts SET display_name = '" . $name . "', email = '" . $email . "', phone = '" . $phone . "', description = '" . $des . "' WHERE IDacc = '$data_user[IDacc]'";
        $db->query($sql_update_info);
        $db->close();
        new Redirect('http://localhost/SoundDreamer/index.php?t=prof');
        die('Chỉnh sửa thông tin thành công');
    } else {
        die('Sai file ajax rồi bae :)');
    }
}
else
{
die('Thiếu action');
}