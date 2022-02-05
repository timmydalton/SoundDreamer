<?php

if ($user) {
?>
    <style>
        .content {
            margin: 30px 0px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .content .profile {
            border: 1px solid #e5e5e5;
            border-radius: 8px;
        }

        .profile {
            width: 600px;
            text-align: center;
        }

        .profile .profile-box {
            border: 1px solid #e5e5e5;
            border-radius: 8px;
            width: 540px;
            margin: 10px auto;
        }

        .profile .profile-box h4 {
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            padding-bottom: 10px;
            border-bottom: 1px solid #e5e5e5;
        }

        .profile img {
            width: 200px;
            height: 200px;
            border-radius: 16px;
            box-shadow: 0 0 5px #000000;
        }

        .note {
            width: 300px;
            background-color: #91d5f0;
            margin-left: auto;
            margin-right: auto;
            border-radius: 6px;
            padding: 5px 5px;
            margin-bottom: 10px
        }

        .form-group#up_img {
            display: flex;
            flex-direction: column;
        }

        .form-group input {
            margin-left: auto;
            margin-right: auto;
            border: 1px solid #e5e5e5;
            padding: 3px 60px 3px 5px;
            border-radius: 6px;
        }

        .form-group#button {
            text-align: initial;
        }

        .form-group a {
            background-color: thistle;
            padding: 5px 10px 7px 10px;
            border-radius: 6px;
            margin-left: 230px;
            cursor: pointer;
        }

        button.submit {
            border-radius: 6px;
            border: none;
            cursor: pointer;
            padding: 6px 10px;
            background-color: thistle;
            margin-top: 20px;
            margin-right: auto;
            margin-left: 100px;
            margin-bottom: 10px;
            font-family: 'Time new Roman';
            font-size: 15px;
        }
    </style>

    <div class="content">
        <div class="profile">
            <h2>Hồ sơ cá nhân</h2>

            <!--Tạo form ảnh-->
            <div class="profile-box" id="upimg">
                <h4>Upload ảnh đại diện</h4>
                <div class="form">
                    <form action="" method="POST" onsubmit="return false;" id="formUpAvt" enctype="multipart/form-data">
                        <img src="data/img-avatar/<?php
                                                    if ($data_user['url_avatar'] == '') {
                                                        echo 'default.png';
                                                    } else {
                                                        echo $data_user['url_avatar'];
                                                    }
                                                    ?> ?>" alt="">
                        <h5>Ảnh hiện tại</h5>
                        <div class="note" id="note">
                            Vui lòng chọn ảnh định dạng .jpg, .png, v.v có dung lượng dưới 5mb
                        </div>
                        <div class="form-group" id="up_img">
                            <label>Chọn hình ảnh</label>
                            <input type="file" class="form-control" id="img_avt" name="img_avt" onchange="preUpAvt();">
                        </div>
                        <div class="form-group" id="button">
                            <button class="submit" type="submit">Upload</button>
                            <a class="del_avt" id="del_avt">Xoá</a>
                        </div>
                    </form>
                </div>
            </div>
            <!--Tạo form thông tin khác-->
            <div class="profile-box">

            </div>
        </div>
    </div>
<?php
} else {
    new Redirect($_DOMAIN);
}

?>