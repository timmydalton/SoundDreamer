<?php

//Require file dẫn đường cho ajax
require_once 'path.php';

if (isset($_POST) && !empty($_FILES['image'])) {
    $duoi = explode('.', $_FILES['image']['name']); // tách chuỗi khi gặp dấu .
    $duoi = $duoi[(count($duoi) - 1)]; //lấy ra đuôi file
    // Kiểm tra xem có phải file ảnh không
    if ($duoi === 'jpg' || $duoi === 'png' || $duoi === 'gif') {
        //Nếu file đã tồn tại thì xoá file cũ
        //checking if file exsists
        if (file_exists($_PATH . '/data/img-avatar/' . $_FILES['image']['name'])) unlink($_PATH . '/data/img-avatar/' . $_FILES['image']['name']);
        // tiến hành upload
        if (move_uploaded_file($_FILES['image']['tmp_name'], $_PATH . '/data/img-avatar/' . $_FILES['image']['name'])) {
            // Nếu thành công
            $sql_change_avt = "UPDATE accounts SET url_avatar = '". $_FILES['image']['name'] ."' WHERE IDacc = '$data_user[IDacc]'";
            $db->query($sql_change_avt);
            $db->close();
            new Redirect('http://localhost/SoundDreamer/index.php?t=prof');
            die('Upload thành công file: ' . $_FILES['image']['name']); //in ra thông báo + tên file
        } else { // nếu không thành công
            die('Có lỗi!'); // in ra thông báo
        }
    } else { // nếu không phải file ảnh
        die('Chỉ được upload ảnh'); // in ra thông báo
    }
} else {
    die('Lock'); // nếu không phải post method
}
