<style>
    .content {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-form {
        border: 2px solid #e5e5e5;
        border-radius: 8px;
        width: 500px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        margin: 30px 0px;
    }

    .login-group {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 400px;
        margin: 10px 0px;
    }

    .login-group img {
        margin: 0px 10px;
        width: 40px;
        height: 40px;
    }

    .login-group p {
        font-size: 24px;
        font-family: 'Arial';
    }

    .login-group#1 
    {
        border-bottom: 1px solid #e5e5e5;
    }

    .form-control {
        border: none;
        border-radius: 8px;
        background-color: #e5e5e5;
        padding: 10px;
        margin: 5px 0px;
    }

    .login-group button {
        border: none;
        border-radius: 8px;
        background-color: #ff8000;
        margin: 10px 0px 0px;
        padding: 8px 10px;
        cursor: pointer;
    }

    .login-group button:hover {
        background-color: #c26100;
    }

    .login-group button:active {
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

    .login-group p{
        all: unset;
        margin-right: 5px;
    }
</style>

<div class="content">
    <div class="login-form">
        <div class = "login-group" id="1">
            <img src="data/img-public/login.png" alt="">
            <p>Đăng nhập</p>
        </div>
        <form method="POST" id="formSignin" onsubmit="return false;">
            <div class="login-group">
                <input type="text" class="form-control" placeholder="Tên đăng nhập..." id="user-signin">
            </div>
            <div class="login-group">
                <input type="password" class="form-control" placeholder="Mật khẩu..." id="pass-signin">
            </div>
            <div class="login-group">
                <p>Bạn chưa có tài khoản?</p>
                <a href="<?php echo $_DOMAIN.'index.php?t=signup' ?>">Đăng ký</a>
            </div>
            <div class="login-group">
                <button type="submit">Xác nhận</button>
            </div>
            <div class="login-group" id="alert1"><div id="alert2"></div></div>
        </form>
    </div>
</div>