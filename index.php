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
            break;
        }
    case 'login':
        {
            //Nếu user đã đăng nhập rồi thì redirect lại domain
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
}

// Require footer
require_once 'includes/footer.php';

?>