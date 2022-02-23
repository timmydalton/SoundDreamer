<?php

//Require file dẫn đường cho ajax
require_once 'path.php';

if (isset($_POST)) {
    $IDSong = $_POST['IDSong'];
    $i = 1;
    if (!$db->num_rows("SELECT * FROM comments WHERE IDSong = $IDSong AND status = '1' ORDER BY IDCmt DESC")) die('Không có comments nào để hiển thị');
    foreach ($db->fetch_assoc("SELECT * FROM comments WHERE IDSong = $IDSong AND status = '1' ORDER BY IDCmt DESC", 0) as $data_cmt) {
?>
        <div class="cmt-box" id="cmt-section">
            <div class="cmt-avatar">
                <img src="data/img-avatar/<?php
                $url_avt = $db->fetch_assoc("SELECT * FROM accounts WHERE IDacc = ". $data_cmt['IDacc'] . "", 1)['url_avatar'];
                echo $url_avt;
                ?>" alt="">
            </div>
            <div class="cmt-info">
                <div class="cmt-head">
                    <h4><span id="cmt-count"><?php echo $i ?></span>. <span id="cmt-user">
                        <?php
                        echo $db->fetch_assoc("SELECT * FROM accounts WHERE IDacc = ". $data_cmt['IDacc'] . "", 1)['display_name'];
                        ?>
                    </span></h4>
                    <p class="p-1"> <?php echo $data_cmt['date'] ?> </p>
                </div>
                <p><?php echo nl2br($data_cmt['data']) ?></p>
            </div>
        </div>
<?php
$i++;
    }
}
