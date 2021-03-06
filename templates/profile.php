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
            <h2>H??? s?? c?? nh??n</h2>

            <!--T???o form ???nh-->
            <div class="profile-box" id="upimg">
                <h4>???nh ?????i di???n</h4>
                <div class="form">
                    <form action="" method="POST" onsubmit="return false;" id="formUpAvt" enctype="multipart/form-data">
                        <img src="data/img-avatar/<?php
                                                    if ($data_user['url_avatar'] == '') {
                                                        echo 'default.png';
                                                    } else {
                                                        echo $data_user['url_avatar'];
                                                    }
                                                    ?>" alt="">
                        <h5>???nh hi???n t???i</h5>
                        <div class="note" id="note">
                            Vui l??ng ch???n ???nh ?????nh d???ng .jpg, .png, v.v c?? dung l?????ng d?????i 5mb
                        </div>
                        <div class="form-group" id="up_img">
                            <label>Ch???n h??nh ???nh</label>
                            <input type="file" class="form-control" id="img_avt" name="img_avt" onchange="preUpAvt();">
                        </div>
                        <div class="form-group" id="button">
                            <button class="submit" type="submit">Upload</button>
                            <a class="del_avt" id="del_avt">Xo??</a>
                        </div>
                    </form>
                </div>
            </div>
            <!--T???o form th??ng tin kh??c-->
            <div class="profile-box">
                <h4>Th??ng tin c?? nh??n</h4>
                <div class="form" id="form-avt">
                    <form action="" method="POST" onsubmit="return false;" id="formInfo">
                        <div class="form-group">
                            <h5>T??n hi???n th???</h5>
                            <input type="text" class="form-control" id="display_name" value="<?php echo '' . $data_user['display_name'] ?>">
                        </div>
                        <div class="form-group">
                            <h5>Email</h5>
                            <input type="text" class="form-control" id="email" value="<?php echo '' . $data_user['email'] ?>">
                        </div>
                        <div class="form-group">
                            <h5>S??? ??i???n tho???i</h5>
                            <input type="text" class="form-control" id="phone" value="<?php echo '' . $data_user['phone'] ?>">
                        </div>
                        <div class="form-group">
                            <h5>M?? t???</h5>
                            <textarea class="des" id="des" cols="31" rows="10"><?php echo '' . $data_user['description'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <button class="submit" type="submit" id="info">Confirm</button>
                        </div>
                        <div id="alertInfo"></div>
                    </form>
                </div>
            </div>
            <!--T???o form m???t kh???u-->
            <div class="profile-box">
                <h4>Thay ?????i m???t kh???u</h4>
                <div class="form" id="form-pass">
                    <form action="" method="POST" onsubmit="return false;" id="formPass">
                        <div class="form-group">
                            <input type="text" class="form-pass" id="pro-user" placeholder="Nh???p t??n t??i kho???n">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-pass" id="pro-pass" placeholder="Nh???p m???t kh???u hi???n t???i...">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-pass" id="pro-repass" placeholder="Nh???p m???t kh???u m???i...">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-pass" id="pro-repass2" placeholder="Nh???p l???i m???t kh???u m???i...">
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