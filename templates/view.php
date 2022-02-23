<?php
if (isset($_GET['id'])) {
?>
    <style>
        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .music-player {
            margin-top: 30px;
            margin-bottom: 30px;
            height: 300px;
            width: 700px;
            border-radius: 16px;
            box-shadow: 0px 0px 15px 10px rgba(0, 0, 0, 0.32);
        }

        .music-player .top {
            display: flex;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
            height: 80%;
            width: auto;
            background: rgb(2, 0, 36);
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(104, 9, 121, 1) 40%, rgba(0, 100, 255, 1) 100%);
        }

        .music-player .top .img {
            height: 100%;
            width: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .music-player .top .song_cover {
            margin-left: 80px;
            height: 175px;
            width: 175px;
            border-radius: 50%;
            animation: rotation 60s infinite linear;
        }

        @keyframes rotation {
            from {
                transform: rotate (0deg);
            }

            to {
                transform: rotate(359deg);
            }
        }

        .music-player .top .desc {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: auto;
            align-items: center;
            justify-content: center;
        }

        .music-player .top .desc #title {
            font-size: 22px;
            color: beige;
            font-family: cursive;
        }

        .music-player .top .desc #singer {
            font-size: 16px;
            color: beige;
            font-family: cursive;
            opacity: 70%;
        }

        .music-player .bottom {
            height: 20%;
            width: auto;
            background-color: #f1f3f4;
            border-bottom-left-radius: 16px;
            border-bottom-right-radius: 16px;
        }

        .music-player .bottom audio {
            width: 100%;
            height: 100%;
        }

        .description {
            margin: 5px 0px;
            padding: 5px 20px;
            width: 700px;
            height: auto;
            box-shadow: 0px 0px 15px 5px rgba(0, 0, 0, 0.32);
        }

        #cmt-sec {
            margin-bottom: 80px;
        }

        .description a {
            color: #7671d1;
        }

        .description a:hover {
            cursor: pointer;
        }

        .description #more {
            display: none;
        }

        .cmt-box {
            margin: 10px 0px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #e5e5e5;
            padding-right: 50px;
        }

        .cmt-box img {
            height: 50px;
            width: auto;
            border-radius: 8px;
            margin-right: 20px;
            margin-left: 20px;
            margin-top: 10px;
        }

        .cmt-box h4 {
            margin: 10px 0px 5px 0px;
        }

        .cmt-box p {
            margin-top: 5px;
        }

        .cmt-head {
            display: flex;
            align-items: center;
        }

        .cmt-box .p-1 {
            padding-top: 10px;
            margin: 0;
            font-size: 12px;
            margin-left: 5px;
            opacity: 60%;
        }

        .cmt-box #cmt-data {
            margin-left: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            padding: 5px 5px;
            border-radius: 8px;
        }

        .cmt-box button {
            margin-left: 10px;
            margin-bottom: 10px;
            border-radius: 6px;
            border: none;
            background-color: #d14848;
            padding: 5px 5px;
            font-family: cursive;
            color: white;
        }

        .cmt-box button:active {
            background-color: #ac3b3b;
        }

        .cmt-box button:hover {
            background-color: #ac3b3b;
            cursor: pointer;
        }

        #data {
            display: none;
        }

        #cmt-section {
            align-items: stretch;
        }

        button#remove {
            margin-bottom: 20px;
            border: none;
            font-family: cursive;
            color: white;
            background-color: #d14848;
            padding: 10px 10px;
            border-radius: 8px;
            transition: all 0.5s;
            cursor: pointer;
            width: 120px;
        }

        button#remove span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        button#remove span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        button#remove:hover span {
            padding-right: 25px;
        }

        button#remove:hover span:after {
            opacity: 1;
            right: 0;
        }

        button#remove:active {
            background-color: #ac3b3b;
        }

        button#show-comments {
            margin-bottom: 20px;
            border: none;
            font-family: cursive;
            color: white;
            background-color: #d14848;
            padding: 10px 10px;
            border-radius: 8px;
            transition: all 0.5s;
            cursor: pointer;
            width: 200px;
            margin-left: 225px;
        }

        button#show-comments:active {
            background-color: #ac3b3b;
        }

        button#show-comments span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        button#show-comments span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        button#show-comments:hover span {
            padding-right: 25px;
        }

        button#show-comments:hover span:after {
            opacity: 1;
            right: 0;
        }
    </style>

    <?php
    if ($_GET['id'] == '') $id = 'NULL';
    else $id = $_GET['id'];
    $sql_get_song = "SELECT * FROM songs WHERE IDSong = " . $id . "";
    if ($db->num_rows($sql_get_song)) {
        $data_songs = $db->fetch_assoc($sql_get_song, 1);
    ?>
        <div class="content">
            <div id="data">
                <p id="IDSong"><?php echo $id ?></p>
                <?php
                if ($user) {
                ?>

                    <p id="IDacc"><?php echo $data_user['IDacc'] ?></p>
                <?php
                }
                ?>
                <p id="date"><?php echo $date_curr ?></p>
            </div>
            <div class="music-player">
                <div class="top">
                    <div class="img">
                        <img src="data/img-song/<?php echo $data_songs['url_cover'] ?>" class="song_cover">
                    </div>
                    <div class="desc">
                        <div id="title"><?php echo $data_songs['songtitle'] ?></div>
                        <div id="singer"><?php echo $data_songs['songsinger'] ?></div>
                    </div>
                </div>
                <div class="bottom">
                    <audio controls autoplay class="audio">
                        <source src="data/audio-song/<?php echo $data_songs['url_audio'] ?>">
                        Your browser not supported this type of audio
                    </audio>
                </div>
            </div>

            <?php
            if ($user) {
                if ($data_user['role'] == 0) {
            ?>
                    <div class="remove">
                        <button id="remove" onclick="delSong()"><span>Xoá bài hát</span></button>
                    </div>
            <?php
                }
            }
            ?>

            <div class="description">
                <h3><?php echo $data_songs['songtitle'] ?> - <?php echo $data_songs['songsinger'] ?></h3>
                <p>Đăng bởi <?php echo $db->fetch_assoc("SELECT * FROM accounts WHERE username = '" . $data_songs['username'] . "'", 1)['display_name']; ?></p>

                <p>Lời bài hát:</p>
                <?php
                $first_lyrics = substr($data_songs['songlyrics'], 0, 0);
                $second_lyrics = substr($data_songs['songlyrics'], 0);
                ?>
                <p>
                    <?php
                    echo nl2br($first_lyrics);
                    if ($second_lyrics) {
                    ?>
                        <span id="more"><?php echo nl2br($second_lyrics); ?></span>
                        <a id="a-see" onclick="seeMore()">...See more</a>
                    <?php
                    }
                    ?>
                </p>
            </div>

            <div class="description" id="cmt-sec">
                <div class="cmt-box" id="cmt-title">
                    <h3>Bình luận</h3>
                </div>
                <?php
                if ($user) {
                ?>
                    <div class="cmt-box" id="cmt-form">
                        <form method="POST" id="formComment" onsubmit="return false;">
                            <div>
                                <textarea id="cmt-data" cols="80" rows="5" id="cmt-data"></textarea>
                            </div>
                            <button type="submit" id="submit">Bình luận</button>
                    </div>
                <?php
                }
                ?>
                <div class="cmt-content">
                    <button id="show-comments" onclick="getCmtData()"><span>Hiển thị bình luận</span></button>
                </div>
            </div>
        </div>
<?php
    }
} else echo "Nothing to show";
