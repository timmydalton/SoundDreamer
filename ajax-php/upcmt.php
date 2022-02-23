<?php

//Require file dẫn đường cho ajax
require_once 'path.php';

//Tồn tại phương thức post
if (isset($_POST['data'])){
    //Xử lý data
    $data = trim(htmlspecialchars(addslashes($_POST['data'])));
    $IDSong = $_POST['IDSong'];
    $IDacc = $_POST['IDacc'];
    $date = $_POST['date'];
    if (!$data)
    {
        echo "Bạn chưa nhập comment";
    }
    else
    {
        $check_word = explode(" ", $data);
        foreach($check_word as $word)
        {
            $sql_check_word = "SELECT * FROM badwords WHERE word = '$word'";
            if ($db->num_rows($sql_check_word))
            {
                die ("Bình luận có chứa từ xấu");
            }
        }
        $sql_up_cmt = "INSERT INTO `comments` (`IDCmt`, `IDSong`, `IDacc`, `date`, `data`, `status`) VALUES (NULL, '$IDSong', '$IDacc', '$date', '$data', '1')";
        $db->query($sql_up_cmt);
        $db->close();
        echo "Gửi bình luận thành công!";
    }
}