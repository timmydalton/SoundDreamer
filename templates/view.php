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
            width: auto;
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
            cursor: pointer;
        }

        #data {
            display: none;
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
            <?php
            if ($user) {
            ?>
                <div id="data">
                    <p id="IDSong"><?php echo $id ?></p>
                    <p id="IDacc"><?php echo $data_user['IDacc'] ?></p>
                    <p id="date"><?php echo $date_curr ?></p>
                </div>
            <?php
            }
            ?>
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

            <div class="description">
                <h3><?php echo $data_songs['songtitle'] ?> - <?php echo $data_songs['songsinger'] ?></h3>
                <p>Đăng bởi <?php echo $data_songs['username'] ?></p>
                <p>Lời bài hát:</p>
                <?php
                $first_lyrics = substr($data_songs['songlyrics'], 0, 100);
                $second_lyrics = substr($data_songs['songlyrics'], 100);
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
                    <button id="show-comments">Hiển thị bình luận</button>
                </div>
            </div>
        </div>
<?php
    }
} else echo "Nothing to show";
