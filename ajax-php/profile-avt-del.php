<?php

//Require file dẫn đường cho ajax
require_once 'path.php';

$sql_delete_avt = "UPDATE accounts SET url_avatar = '' WHERE IDacc = '$data_user[IDacc]'";
$db->query($sql_delete_avt);
$db->close();
new Redirect('http://localhost/SoundDreamer/index.php?t=prof');