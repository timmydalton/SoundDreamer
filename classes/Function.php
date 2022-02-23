<?php

//Hàm điều hướng
class Redirect
{
    public function __construct($url = null)
    {
        if ($url)
        {
            echo '<script>location.href="'.$url.'"; </script>';
        }
    }
}

//Show comment theo id bài hát
class ShowComment
{
    public function __construct($id)
    {
        
    }
}

?>