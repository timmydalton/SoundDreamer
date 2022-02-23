<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sound dreamer</title>
    <link rel="icon" href=<?php echo $_DOMAIN . 'data/img-public/favicon-32x32.png' ?> type="image/png" sizes="32x32">
    <link rel="stylesheet" href=<?php echo $_DOMAIN . 'css/style.css' ?>>
    <style>
        .nav-item#nav-user {
            margin-left: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .nav-item#nav-user p {
            color: white;
        }

        .nav-item#nav-user img {
            margin: 0px 10px;
            height: 40px;
            width: 40px;
            border-radius: 8px;
            box-shadow: 0px 0px 5px white;
        }

        .nav-item#nav-log {
            margin-left: 0px !important;
        }

        @media (max-width:800px) {
            .nav-item .uname p {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="nav-item" id="nav-logo">
            <img src="data/img-public/nav-logo.png" alt="">
        </div>
        <div class="nav-item" id="nav-rou">
            <a href=<?php echo $_DOMAIN . 'index.php' ?> id="a-home">
                Home
            </a>
        </div>
        <div class="nav-item" id="nav-rou">
            <a href=<?php echo $_DOMAIN . 'index.php?t=prof' ?> id="a-prof">
                Profile
            </a>
        </div>
        <?php
        if ($data_user['role'] == 0) {
        ?>
            <div class="nav-item" id="nav-rou">
                <a href=<?php echo $_DOMAIN . 'index.php?t=up-au' ?> id="a-up-au">
                    Upload
                </a>
            </div>
        <?php
        }
        ?>
        <div class="nav-item" id="nav-user">
            <div class="uname" id="user-name">
                <p><?php echo $data_user['display_name']; ?></p>
            </div>
            <img src="data/img-avatar/<?php
                                        if ($data_user['url_avatar'] == '') {
                                            echo 'default.png';
                                        } else {
                                            echo $data_user['url_avatar'];
                                        }
                                        ?>" alt="">
        </div>
        <div class="nav-item" id="nav-log">
            <a href=<?php echo $_DOMAIN . 'ajax-php/signout.php' ?> id="a-login">
                Logout
            </a>
            <button class="drop-button" id="drop-button">
                X
            </button>
        </div>
    </div>

    <div class="dropdown" id="dropdown">
        <div class="dropdown-content">
            <a href=<?php echo $_DOMAIN . 'index.php' ?>>Home</a>
            <a href=<?php echo $_DOMAIN . 'index.php?t=prof' ?>>Profile</a>
            <?php
            if ($data_user['role'] == 0) {
            ?>
                <a href=<?php echo $_DOMAIN . 'index.php?t=up-au' ?>>Upload</a>
            <?php
            }
            ?>
            <a href=<?php echo $_DOMAIN . 'ajax-php/signout.php' ?>>Đăng xuất</a>
        </div>
    </div>

    <div class="div-spacing"></div>

    <div class="div-splash">
        <img src="data/img-public/splash-art.jpg" alt="">
    </div>

    <div class="div-search">
        <div id="search-bar">
            <input type="text" id="search-input" placeholder="Search for musics....">
        </div>
        <div id="button">
            <button id="search-button">Search</button>
        </div>
    </div>