<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Chat Bot Halodek Modify By Putra</title>
    <link rel="stylesheet"
          href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="title">Halodek - Chatbot</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p>Halo, Dokter disini. ada yang bisa di bantu?</p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="text-pesan"
                       type="text"
                       placeholder="Ketikan pertanyaan mu disini..."
                       required>
                <button id="send-btn">Kirim</button>
            </div>
        </div>
    </div>

</body>

</html>

<script>
$(document).ready(function() {
    //jika tombol kirim di klik
    $("#send-btn").on("click", function() {
        $pesan = $("#text-pesan").val();
        //tampung pesan ke variable msg
        $msg = '<div class ="user-inbox inbox"><div class="msg-header"><p>' + $pesan +
            '</p></div></div>';
        //masukan ke form chat 
        $(".form").append($msg);
        //mengosongkan inputan
        $("#text-pesan").val('');

        //pake ajax
        $.ajax({
            url: 'pesan.php',
            type: 'POST',
            data: 'isi_pesan=' + $pesan,
            success: function(result) {
                $balasan =
                    '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class ="msg-header"><p>' +
                    result + '</p></div></div>';

                //masukan ke form chat 
                $(".form").append($balasan);

                //buat form otomatis scroll
                $(".form").scrollTop($(".form")[0].scrollHeight);
            }
        });
    });
})
</script>