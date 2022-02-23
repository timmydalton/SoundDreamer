<style>
    .content {
        display: flex;
        justify-content: center;
    }

    .content #left {
        width: 600px;
        height: auto;
        justify-content: center;
        border-right: 1px solid #e5e5e5;
        border-left: 1px solid #e5e5e5;
        margin-bottom: 60px;
        padding-right: 30px;
    }

    .content #left #left_title {
        width: 100%;
        text-align: center;
        font-size: 24px;
        font-family: cursive;
    }

    .left_1 {
        margin: 10px 20px 10px 20px;
        border-top: 1px solid #e5e5e5;
        display: flex;
        justify-content: center;
        padding-bottom: 20px;
        padding-left: 20px;
    }

    .box-container a {
        text-decoration: none;
    }

    .left_1 img {
        width: 120px;
        height: auto;
        margin: 30px 15px 5px 15px;
        border-radius: 10%;
    }

    .song_name {
        text-align: center;
        word-wrap: break-word;
        font-family: cursive;
        font-size: 18px;
        height: 50px;
    }

    .see-more-div {
        width: 100%;
        height: 30px;
    }

    a.see-more {
        padding-right: 30px;
        font-family: cursive;
        color: #575353;
    }

    .right {
        padding-top: 10px;
        margin-left: 20px;
        width: 300px;
        font-family: Arial, sans-serif;
    }

    .right .right-container {
        display: flex;
        justify-content: left;
        border-top: 1px solid #e5e5e5;
        margin-left: 10px;
    }

    .right .number {
        width: 10%;
        font-size: 25px;
        padding: 10px 10px 10px 10px;
        font-weight: bold;
        color: #535353ef;
    }

    .right .song-info {
        margin: auto auto auto 0px;
    }

    .right .song-info .song-title {
        font-size: 18px;
    }

    .right .song-info .singer {
        font-size: 14px;
        color: #999;
    }

    .right .vote-count {
        padding: 15px 10px 0px 0px;
        color: #999;
    }

    .right-title {
        font-family: Arial, Helvetica, sans-serif;
        margin-left: 40px;
        font-size: 25px;
        padding-bottom: 10px;
    }

    a.see-more {
        text-decoration: none;
        float: right;
    }

    #left_title {
        margin-top: 20px;
    }

    .right-title {
        margin-top: 20px;
    }

    @media (max-width: 800px) {
        .content {
            flex-direction: column-reverse;
            align-items: center;
        }
    }
</style>

<div class="content">
    <div id="left">
        <div class="container">
            <div id="left_title">Dành riêng cho bạn</div>
            <div class="left_1">
                <?php
                foreach ($db->fetch_assoc("SELECT * FROM songs WHERE status = '1' ORDER BY RAND() LIMIT 4", 0) as $data_newest) {
                ?>
                    <div class="box-container">
                        <a href="<?php echo $_DOMAIN . 'index.php?t=view&id=' . $data_newest['IDSong'] ?>">
                            <img src="data\img-song\<?php echo $data_newest['url_cover'] ?>" alt="">
                        </a>
                        <div class="song_name">
                            <?php echo $data_newest['songtitle'] ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="container">
            <div id="left_title">Nhạc mới</div>
            <div class="left_1">
                <?php
                foreach ($db->fetch_assoc("SELECT * FROM songs WHERE status = '1' ORDER BY IDSong DESC LIMIT 4", 0) as $data_newest) {
                ?>
                    <div class="box-container">
                        <a href="<?php echo $_DOMAIN . 'index.php?t=view&id=' . $data_newest['IDSong'] ?>">
                            <img src="data\img-song\<?php echo $data_newest['url_cover'] ?>" alt="">
                        </a>
                        <div class="song_name">
                            <?php echo $data_newest['songtitle'] ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="see-more-div">
                <a class="see-more" href="<?php echo $_DOMAIN . 'index.php?t=search&s=' ?>">Xem thêm ></a>
            </div>
        </div>
    </div>
    <div class="right">
        <div class="right-title">Bảng xếp hạng</div>
        <?php
        $a = 1;
        foreach ($db->fetch_assoc('SELECT IDSong, COUNT(*) as count FROM comments WHERE status = 1 GROUP BY IDSong ORDER BY count DESC LIMIT 5', 0) as $data_chart) {
            $id = $data_chart['IDSong'];
            $song = $db->fetch_assoc("SELECT * FROM songs WHERE IDSong ='$id'", 1);
        ?>
            <div class="right-container">
                <div class="number"><?php echo $a ?></div>
                <div class="song-info">
                    <div class="song-title"><?php echo $song['songtitle'] ?></div>
                    <div class="singer"><?php echo $song['songsinger'] ?></div>
                </div>
                <div class="vote-count"><?php echo $data_chart['count'] ?></div>
            </div>
        <?php
        $a++;
        }
        ?>
    </div>
</div>