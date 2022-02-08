<?php

//Require file dẫn đường cho ajax
require_once 'path.php';

if ($user) {
    if (isset($_POST) && !empty($_FILES['audio']) && !empty($_FILES['cover'])) {
        $duoi_audio = explode('.', $_FILES['audio']['name']); // tách chuỗi khi gặp dấu .
        $duoi_audio = $duoi_audio[(count($duoi_audio) - 1)]; //lấy ra đuôi file audio
        $title = trim(htmlspecialchars(addslashes($_POST['title'])));
        $singer = trim(htmlspecialchars(addslashes($_POST['singer'])));
        $lyrics = trim(htmlspecialchars(addslashes($_POST['lyrics'])));
        //Check tên bài hát
        $sql_check_song_exist = "SELECT songtitle FROM songs WHERE songtitle = '$title'";
        if (!$db->num_rows($sql_check_song_exist)) {
            if ($duoi_audio == 'mp3') {
                $duoi_cover = explode('.', $_FILES['cover']['name']); // tách chuỗi khi gặp dấu .
                $duoi_cover = $duoi_cover[(count($duoi_cover) - 1)]; //lấy ra đuôi file audio
                if ($duoi_cover === 'jpg' || $duoi_cover === 'png' || $duoi_cover === 'jpeg') {
                    //Tạo folder của user trong hai thư mục audio và ảnh cover nếu chưa có
                    if (!file_exists($_PATH . '/data/audio-song/' . $user)) mkdir($_PATH . '/data/audio-song/' . $user);
                    if (!file_exists($_PATH . '/data/img-song/' . $user)) mkdir($_PATH . '/data/img-song/' . $user);
                    //Nếu file cũ tồn tại thì xoá
                    if (file_exists($_PATH . '/data/audio-song/' . $user . '/' . $_FILES['audio']['name'])) unlink($_PATH . '/data/audio-song/' . $user . '/' . $_FILES['audio']['name']);
                    if (file_exists($_PATH . '/data/img-song/' . $user . '/' . $_FILES['cover']['name'])) unlink($_PATH . '/data/img-song/' . $user . '/' . $_FILES['cover']['name']);
                    //Di chuyển file
                    if (move_uploaded_file($_FILES['audio']['tmp_name'], $_PATH . '/data/audio-song/' . $user . '/' . $_FILES['audio']['name'])) {
                        if (move_uploaded_file($_FILES['cover']['tmp_name'], $_PATH . '/data/img-song/' . $user . '/' . $_FILES['cover']['name'])) {
                            //Đăng dữ liệu lên db
                            $sql_up_audio = "INSERT INTO songs (username, songtitle, songsinger, songlyrics, url_cover, url_audio, status) VALUES (\"" . $user . "\",\"" . $title . "\",\"" . $singer . "\",\"" . $lyrics . "\",\"" . $user . "/" . $_FILES['cover']['name'] . "\",\"" . $user . "/" . $_FILES['audio']['name'] . "\", 1);";
                            $db->query($sql_up_audio);
                            $db->close();
                            new Redirect('http://localhost/SoundDreamer/index.php?t=home');
                            die('Đăng tải nhạc thành công!');
                        } else {
                            die('Gửi file ảnh cover thất bại!');
                        }
                    } else {
                        die('Gửi file nhạc thất bại!');
                    }
                } else {
                    die('Chỉ được upload file ảnh định dạng jpg, png, jpeg');
                }
            } else {
                die('Chỉ được upload file audio .mp3');
            }
        }
        else {
            die('Bài hát đã tồn tại');
        }
    } else {
        die('Lock');
    }
} else {
    die('Bạn cần đăng nhập để tải nhạc lên!!!');
}
