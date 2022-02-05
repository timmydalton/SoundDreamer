<?php
 
//Require file dẫn đường cho ajax
require_once 'path.php';
 
// Xoá session
$session->destroy();
new Redirect($_DOMAIN); // Trở về trang index
 
?>