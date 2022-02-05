<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sound dreamer</title>
    <link rel="icon" href=<?php echo $_DOMAIN.'data/img-public/favicon-32x32.png' ?> type="image/png" sizes="32x32">
    <link rel="stylesheet" href=<?php echo $_DOMAIN.'css/style.css' ?>>
</head>

<body>
    <div class="navbar">
        <div class="nav-item" id="nav-logo">
            <img src="data/img-public/nav-logo.png" alt="">
        </div>
        <div class="nav-item" id="nav-rou">
            <a href=<?php echo $_DOMAIN ?> id="a-home">
                Home
            </a>
        </div>
        <div class="nav-item" id="nav-log">
            <a href=<?php echo $_DOMAIN.'index.php?t=login' ?> id="a-login">
                Login
            </a>
            <button class="drop-button" id="drop-button">
                X
            </button>
        </div>
    </div>

    <div class="dropdown" id="dropdown">
        <div class="dropdown-content">
            <a href=<?php echo $_DOMAIN ?>>Home</a>
            <a href=<?php echo $_DOMAIN.'index.php?t=login' ?>>Login</a>
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