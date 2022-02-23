<?php

//Require file dẫn đường cho ajax
require_once 'path.php';

if (isset($_POST)) {
    $IDSong = $_POST['IDSong'];
    $db->query("UPDATE songs SET status = '0' WHERE IDSong = '$IDSong'");
    $db->query("UPDATE comments SET status = '0' WHERE IDSong = '$IDSong'");
    echo 'Success';
    new Redirect($_DOMAIN);
}