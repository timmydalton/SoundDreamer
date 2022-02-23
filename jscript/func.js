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
}

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
}