<?php
if ($user) {
?>
    <style>
        a#a-up-au {
            color: #8adcde !important;
        }

        .content {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .upload-audio {
            margin: 30px 0px;
            border-radius: 8px;
            width: 500px;
            background-color: #e5e5e5;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form {
            width: 99%;
            border-radius: 8px;
            background-color: white;
            margin-bottom: 1px;
        }

        .form h5 {
            margin-left: 30px;
            margin-bottom: 10px;
        }

        .form input.up-song-file {
            border: 1px solid #e5e5e5;
            width: 300px;
            padding: 5px 5px;
            margin-left: 20px;
            border-radius: 8px;
        }

        .form input.up-song {
            width: 350px;
            border: none;
            background-color: #e5e5e5;
            padding: 8px 15px 8px 15px;
            margin-left: 20px;
            border-radius: 8px;
        }

        .form .up-song-lyrics {
            width: 425px;
            margin-left: 20px;
            border-radius: 8px;
            background-color: #e5e5e5;
            border: none;
            padding: 10px 15px 10px 15px;
            font-family: 'arial';
            margin-bottom: 10px;
        }

        .form-control-submit {
            display: flex;
        }

        .form .submit {
            margin: 10px auto 10px auto;
        }

        .alert {
            width: 100%;
            text-align: center;
            color: red;
            margin-bottom: 20px
        }

        .submit {
            border-radius: 6px;
            border: none;
            background-color: #7EDB5D;
            padding: 5px 12px;
            font-size: 15px;
            cursor: pointer;
        }

        .submit:hover {
            background-color: #88EA65;
        }

        .submit:focus {
            background-color: #7EDB5D;
        }

        .submit:active {
            background-color: #88EA65;
            transform: translateY(5px);
        }
    </style>

    <div class="content">
        <div class="upload-audio">
            <h2>Tải nhạc lên</h2>
            <div class="form">
                <form action="" method="POST" onsubmit="return false;" id="formUpAudio" enctype="multipart/form-data">
                    <h5>Chọn file nhạc:</h5>
                    <div class="form-control">
                        <input type="file" class="up-song-file" id="up-audio">
                    </div>
                    <h5>Chọn ảnh cover:</h5>
                    <div class="form-control">
                        <input type="file" class="up-song-file" id="up-cover">
                    </div>
                    <h5>Tên bài hát:</h5>
                    <div class="form-control">
                        <input type="text" class="up-song" id="up-song-title" placeholder="Tên bài hát....">
                    </div>
                    <h5>Tên ca sĩ:</h5>
                    <div class="form-control">
                        <input type="text" class="up-song" id="up-song-singer" placeholder="Tên ca sĩ....">
                    </div>
                    <h5>Lời bài hát:</h5>
                    <div class="form-control">
                        <textarea name="" class="up-song-lyrics" id="up-song-lyrics" cols="30" rows="10" placeholder="Lời bài hát..."></textarea>
                    </div>
                    <div class="form-control-submit">
                        <button class="submit" type="submit" id="formUpAudio">Submit</button>
                    </div>
                    <div class="alert" id="alert"></div>
                </form>
            </div>
        </div>
    </div>
<?php
} else {
    new Redirect($_DOMAIN);
}
?>