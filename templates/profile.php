<?php

if ($user) {
?>
    <style>
        a#a-prof {
            color: #8adcde !important;
        }

        .content {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .content .profile {
            border: 1px solid #e5e5e5;
            border-radius: 8px;
        }

        .profile {
            margin: 30px 0px;
            width: 580px;
            text-align: center;
            background-color: #e5e5e5;
        }

        .profile .profile-box {
            background-color: white;
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

        .form {
            margin-bottom: 30px;
        }

        #des {
            font-family: 'Arial';
            border-color: #e5e5e5;
            border-radius: 6px;
        }

        #info {
            margin-left: 0px;
        }

        #change-pass {
            margin-left: 0px;
        }

        #alertInfo {
            color: red;
        }

        #alertPass {
            color: red;
        }

        .form-group .form-pass {
            margin: 5px 0px;
        }
    </style>

    <div class="content">
        <div class="profile">
            <h2>Hồ sơ cá nhân</h2>

            <!--Tạo form ảnh-->
            <div class="profile-box" id="upimg">
                <h4>Ảnh đại diện</h4>
                <div class="form">
                    <form action="" method="POST" onsubmit="return false;" id="formUpAvt" enctype="multipart/form-data">
                        <img src="data/img-avatar/<?php
                                                    if ($data_user['url_avatar'] == '') {
                                                        echo 'default.png';
                                                    } else {
                                                        echo $data_user['url_avatar'];
                                                    }
                                                    ?>" alt="">
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
                <h4>Thông tin cá nhân</h4>
                <div class="form" id="form-avt">
                    <form action="" method="POST" onsubmit="return false;" id="formInfo">
                        <div class="form-group">
                            <h5>Tên hiển thị</h5>
                            <input type="text" class="form-control" id="display_name" value="<?php echo '' . $data_user['display_name'] ?>">
                        </div>
                        <div class="form-group">
                            <h5>Email</h5>
                            <input type="text" class="form-control" id="email" value="<?php echo '' . $data_user['email'] ?>">
                        </div>
                        <div class="form-group">
                            <h5>Số điện thoại</h5>
                            <input type="text" class="form-control" id="phone" value="<?php echo '' . $data_user['phone'] ?>">
                        </div>
                        <div class="form-group">
                            <h5>Mô tả</h5>
                            <textarea class="des" id="des" cols="31" rows="10"><?php echo '' . $data_user['description'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <button class="submit" type="submit" id="info">Confirm</button>
                        </div>
                        <div id="alertInfo"></div>
                    </form>
                </div>
            </div>
            <!--Tạo form mật khẩu-->
            <div class="profile-box">
                <h4>Thay đổi mật khẩu</h4>
                <div class="form" id="form-pass">
                    <form action="" method="POST" onsubmit="return false;" id="formPass">
                        <div class="form-group">
                            <input type="text" class="form-pass" id="pro-user" placeholder="Nhập tên tài khoản">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-pass" id="pro-pass" placeholder="Nhập mật khẩu hiện tại...">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-pass" id="pro-repass" placeholder="Nhập mật khẩu mới...">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-pass" id="pro-repass2" placeholder="Nhập lại mật khẩu mới...">
                        </div>
                        <div class="form-group">
                            <button class="submit" type="submit" id="change-pass">Confirm</button>
                        </div>
                        <div id="alertPass"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
} else {
    new Redirect($_DOMAIN);
}

?>