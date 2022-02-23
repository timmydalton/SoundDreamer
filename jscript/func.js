$_DOMAIN = 'http://localhost/SoundDreamer/';

//Thanh tìm kiếm

$('.div-search button').on('click', function() {
    $s = $('.div-search #search-input').val();
    window.location.href = $_DOMAIN + 'index.php?t=search&s=' + $s;
});

$('audio').prop("volume", 0.25);

function seeMore() {
    if ($('#more').css("display") == "none") {
        $('#more').css("display", "inline");
        $('#a-see').html("</br>See less...");
    } else {
        $('#more').css("display", "none");
        $('#a-see').html("...See more");
    }
};

function getCmtData() {
    $IDSong = $('#IDSong').text();
    $.ajax({
        url: $_DOMAIN + 'ajax-php/getcmt.php',
        type: 'POST',
        data: {
            IDSong: $IDSong
        },
        success: function(data) {
            $('.cmt-content').html(data);
        }
    });
};

function delSong() {
    $IDSong = $('#IDSong').text();
    $confirm = confirm("Bạn có chắc muốn xoá bài hát này không?");
    if ($confirm == true) {
        $.ajax({
            url: $_DOMAIN + 'ajax-php/delsong.php',
            type: 'POST',
            data: {
                IDSong: $IDSong
            },
            success: function(data) {
                $('#IDSong').html(data);
            }
        });

    }
};