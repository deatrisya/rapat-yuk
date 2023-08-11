<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>rapat yuk | pesanan masuk</title>
</head>
<body>
    <h2>{{ $BookUser['title'] }}</h2>
    <p>Detail pemesanan ruangan:</p>
    <table>
        <tr>
            <td>Nama Pemesan </td>
            <td>:</td>
            <td>{{ $BookUser['name_book'] }}</td>
        </tr>
        <tr>
            <td>Tanggal Pemesanan </td>
            <td>:</td>
            <td>{{ $BookUser['date_book'] }}</td>
        </tr>
        <tr>
            <td>Waktu </td>
            <td>:</td>
            <td>{{ $BookUser['str_time_book'] }} - {{ $BookUser['end_time_book'] }}</td>
        </tr>
        <tr>
            <td>Ruang </td>
            <td>:</td>
            <td>{{ $BookUser['room_book'] }}</td>
        </tr>
        <tr>
            <td>Jumlah Peserta </td>
            <td>:</td>
            <td>{{ $BookUser['total_participant'] }}</td>
        </tr>
        <tr>
            <td>Jumlah Konsumsi </td>
            <td>:</td>
            <td>{{ $BookUser['total_consumption'] }}</td>
        </tr>
        <tr>
            <td>Keterangan </td>
            <td>:</td>
            <td>{{ $BookUser['annotation'] }}</td>
        </tr>
    </table>
    <p>Fasilitas Ruang Rapat: <br>
        {{ $BookUser['room_facility'] }}.
        </p>
    <p>
        Harap diperhatikan bahwa kami akan mengirimkan konfirmasi akhir dalam 1x24 jam setelah menerima email ini. <br>
        Jika Anda menemui perubahan atau memiliki permintaan khusus tambahan, <br>
        mohon segera menghubungi kami melalui melalui nomor telepon kami di (Nomor Telepon) sebelum batas waktu konfirmasi.
    </p>
    <p>Terima kasih,</p>
    <p>Admin PLN</p>
</body>
</html>
