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
            require_once 'templates/login.php';
            break;
        }
}

// Require footer
require_once 'includes/footer.php';

?>