<?php
$koneksi = mysqli_connect("localhost", "root", "", "lat_chatbot") or die("Database Error");
//ambil dari ajax
$pesan = mysqli_real_escape_string($koneksi, $_POST['isi_pesan']);
//cek message ke table
$cek_data = mysqli_query($koneksi, "SELECT jawaban FROM chatbot WHERE pertanyaan LIKE'%$pesan%'");
//jika pertanyaa di temukan maka show
if (mysqli_num_rows($cek_data) > 0) {
    //hasil querry di tampung ke variable data
    $data = mysqli_fetch_assoc($cek_data);
    //menampung semua jawaban ke variable di kirim ke ajax
    $balasan = $data['jawaban'];
    echo $balasan;
} else {
    echo "Maaf Saya belum menemukan jawaban untuk pertanyaan kamu, Coba menggunakan kata lain";
}