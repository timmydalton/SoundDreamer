<?php

//Require file init
require_once 'core/init.php';

//Require header depend on $user
if ($user != '')
{
    include_once 'includes/header-user.php';
}
else
{
    include_once 'includes/header-guest.php';
}

//Require body content
switch ($tab)
{
    case 'home':
        {
            require_once 'templates/home.php';
            break;
        }
    case 'login':
        {
            //Nếu user đã đăng nhập rồi mà vẫn cố truy cập thì redirect lại domain
            if ($user != '')
            {
                new Redirect($_DOMAIN);
                break;
            }
            else
            {
                require_once 'templates/login.php';
                break;
            }
        }
    case 'prof':
        {
            require_once 'templates/profile.php';
            break;
        }
    case 'up-au':
        {
            require_once 'templates/upload-audio.php';
            break;
        }
    case 'signup':
        {
            require_once 'templates/signup.php';
            break;
        }
    case 'search':
        {
            require_once 'templates/search.php';
            break;
        }
    case 'view':
        {
            require_once 'templates/view.php';
            break;
        }
}

// Require footer
require_once 'includes/footer.php';

?>