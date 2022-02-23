<?php
if ($user) {
    new Redirect($_DOMAIN);
} else {
?>
    <style>
        .content {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .signup-form {
            border: 2px solid #e5e5e5;
            border-radius: 8px;
            width: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 30px 0px;
        }

        .signup-group {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 400px;
            margin: 10px 0px;
        }

        .signup-group img {
            margin: 0px 10px;
            width: 40px;
            height: 40px;
        }

        .signup-group p {
            font-size: 24px;
            font-family: 'Arial';
        }

        .signup-group#1 {
            border-bottom: 1px solid #e5e5e5;
        }

        .form-control {
            border: none;
            border-radius: 8px;
            background-color: #e5e5e5;
            padding: 10px;
            margin: 5px 0px;
        }

        .signup-group button {
            border: none;
            border-radius: 8px;
            background-color: #ff8000;
            margin: 10px 0px 0px;
            padding: 8px 10px;
            cursor: pointer;
        }

        .signup-group button:hover {
            background-color: #c26100;
        }

        .signup-group button:active {
            background-color: #c26100;
            transform: translateY(4px);
        }

        #alert1 {
            height: 50px;
        }

        #alert2 {
            display: none;
            color: red;
        }
    </style>

    <div class="content">
        <div class="signup-form">
            <div class="signup-group" id="1">
                <img src="data/img-public/signup.png" alt="">
                <p>Đăng ký</p>
            </div>
            <form method="POST" id="formSignup" onsubmit="return false;">
                <div class="signup-group">
                    <input type="text" class="form-control" placeholder="Tên đăng nhập..." id="user-signup">
                </div>
                <div class="signup-group">
                    <input type="password" class="form-control" placeholder="Mật khẩu..." id="pass-signup">
                </div>
                <div class="signup-group">
                    <input type="password" class="form-control" placeholder="Nhập lại mật khẩu..." id="pass-signup2">
                </div>
                <div class="signup-group">
                    <button type="submit">Xác nhận</button>
                </div>
                <div class="signup-group" id="alert1">
                    <div id="alert2"></div>
                </div>
            </form>
        </div>
    </div>
<?php
}
?>