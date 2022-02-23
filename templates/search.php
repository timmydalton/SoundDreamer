<style>
    .content {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .content img {
        width: 150px;
        height: 150px;
        border-radius: 16px;
    }

    .content a {
        text-decoration: none;
    }

    .caption {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        max-width: 150px;
    }

    .caption a {
        height: 50px;
        margin-top: 10px;
        font-size: 20px;
    }

    .caption p {
        margin-top: 10px;
        font-size: 13px;
    }

    .content .row {
        margin-top: 30px;
        display: flex;
    }

    .content .box {
        margin-left: 30px;
        margin-right: 30px;
    }

    .content .err {
        margin-bottom: 30px;
    }
</style>

<div class="content">
    <?php
    $s = trim(htmlspecialchars(addslashes($_GET['s'])));
    if (!$s) $s = '';
    ?>
    <div>
        <h1>Kết quả tìm kiếm : <?php if ($s) echo $s; else echo 'Mới nhất' ?></h1>
    </div>
    <div class="row">
        <?php

        $sql_get_result = "SELECT * FROM songs WHERE status = '1' AND songtitle LIKE '%$s%' OR songsinger LIKE '%$s%' ORDER BY IDSong DESC";
        $i = 0;
        if ($db->num_rows($sql_get_result)) {
            foreach ($db->fetch_assoc($sql_get_result, 0) as $data_songs) {
        ?>
                <div class="box">
                    <div class="thumbnail">
                        <a href="<?php echo $_DOMAIN.'index.php?t=view&id='.$data_songs['IDSong'] ?>">
                            <img src="data/img-song/<?php echo $data_songs['url_cover'] ?>">
                        </a>
                        <div class="caption">
                            <p><?php echo $data_songs['songsinger'] ?></p>
                            <a href="<?php echo $_DOMAIN.'index.php?t=view&id='.$data_songs['IDSong'] ?>"><?php echo $data_songs['songtitle'] ?></a>
                        </div>
                    </div>
                </div>
            <?php
                $i += 1;
                if ($i % 4 == 0) {
                    echo '</div> <div class="row">';
                }
            }
        } else {
            ?>
            <div class="err">Không tìm thấy kết quả</div>
        <?php
        }
        ?>

    </div>
</div>