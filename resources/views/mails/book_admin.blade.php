<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>rapat yuk | pesanan masuk</title>
</head>
<body>
    <h2>{{ $BookAdmin['title'] }}</h2>
    <p>Detail pemesanan ruangan:</p>
    <table>
        <tr>
            <td>Nama Pemesan </td>
            <td>:</td>
            <td>{{ $BookAdmin['name_book'] }}</td>
        </tr>
        <tr>
            <td>Tanggal Pemesanan </td>
            <td>:</td>
            <td>{{ $BookAdmin['date_book'] }}</td>
        </tr>
        <tr>
            <td>Waktu </td>
            <td>:</td>
            <td>{{ $BookAdmin['str_time_book'] }} - {{ $BookAdmin['end_time_book'] }}</td>
        </tr>
        <tr>
            <td>Ruang </td>
            <td>:</td>
            <td>{{ $BookAdmin['room_book'] }}</td>
        </tr>
        <tr>
            <td>Jumlah Peserta </td>
            <td>:</td>
            <td>{{ $BookAdmin['total_participant'] }}</td>
        </tr>
        <tr>
            <td>Jumlah Konsumsi </td>
            <td>:</td>
            <td>{{ $BookAdmin['total_consumption'] }}</td>
        </tr>
        <tr>
            <td>Keterangan </td>
            <td>:</td>
            <td>{{ $BookAdmin['annotation'] }}</td>
        </tr>
    </table>
    <p>Fasilitas Ruang Rapat: <br>
        {{ $BookAdmin['room_facility'] }}.
        </p>
    <p>
        Harap periksa ketersediaan ruang pada tanggal dan waktu yang disebutkan di atas serta pastikan semua fasilitas yang diminta oleh pemesan dapat dipenuhi. <br>
        Mohon untuk segera mengkonfirmasi pemesanan ini dengan mengirimkan pesan balasan kepada pemesan untuk memberitahu bahwa pesanan telah diterima dan akan segera di-review. <br>
        Harap dicatat bahwa batas waktu untuk mengkonfirmasi pemesanan adalah 1x24 jam setelah pemesanan dilakukan.
    </p>
</body>
</html>
