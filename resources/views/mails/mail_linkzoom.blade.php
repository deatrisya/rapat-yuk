<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>rapat yuk | Informasi Link Video Conference Pemesanan Ruang Rapat</title>
</head>
<body>
    <h2>{{ $MailLink['title'] }}</h2>
    <h3>Kepada {{ $MailLink['receiver'] }}</h3>
    <p>Kami ingin memberitahukan bahwa link rapat untuk pemesanan ruang rapat Anda sudah tersedia dan siap untuk digunakan. <br> Berikut ini detail pemesanan yang telah dikonfirmasi:</p>
    <table>
        <tr>
            <td>Tanggal Pemesanan </td>
            <td>:</td>
            <td>{{ $MailLink['date_book'] }}</td>
        </tr>
        <tr>
            <td>Waktu </td>
            <td>:</td>
            <td>{{ $MailLink['str_time_book'] }} - {{ $MailLink['end_time_book'] }}</td>
        </tr>
        <tr>
            <td>Ruang </td>
            <td>:</td>
            <td>{{ $MailLink['room_book'] }}</td>
        </tr>
        <tr>
            <td>Jumlah Peserta </td>
            <td>:</td>
            <td>{{ $MailLink['total_participant'] }}</td>
        </tr>
        <tr>
            <td>Jumlah Konsumsi </td>
            <td>:</td>
            <td>{{ $MailLink['total_consumption'] }}</td>
        </tr>
        <tr>
            <td>Keterangan </td>
            <td>:</td>
            <td>{{ $MailLink['annotation'] }}</td>
        </tr>
        <tr>
            <td>Link Zoom </td>
            <td>:</td>
            <td>{{ $MailLink['link_zoom'] }}</td>
        </tr>
    </table>

        Harap tiba tepat waktu pada tanggal dan waktu yang telah Anda tentukan. <br>
        Jika Anda memiliki pertanyaan lebih lanjut atau perlu melakukan perubahan pada pemesanan, <br>
        jangan ragu untuk menghubungi kami di (nomor telepon) atas nama (pemilik nomor telepon)
    </p>
    <p>Terima kasih,</p>
    <p>Admin {{ $MailLink['admin_name'] }}</p>
</body>
</html>
