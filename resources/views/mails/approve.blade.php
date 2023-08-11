<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>rapat yuk | pesanan disetujui</title>
</head>
<body>
    <h2>{{ $MailApprove['title'] }}</h2>
    <h3>Kepada {{ $MailApprove['receiver'] }}</h3>
    <p>Kami dengan senang hati ingin menginformasikan bahwa pemesanan ruang rapat Anda telah disetujui.<br>
        Berikut ini detail pemesanan yang telah dikonfirmasi:</p>
    <table>
        <tr>
            <td>Tanggal Pemesanan </td>
            <td>:</td>
            <td>{{ $MailApprove['date_book'] }}</td>
        </tr>
        <tr>
            <td>Waktu </td>
            <td>:</td>
            <td>{{ $MailApprove['str_time_book'] }} - {{ $MailApprove['end_time_book'] }}</td>
        </tr>
        <tr>
            <td>Ruang </td>
            <td>:</td>
            <td>{{ $MailApprove['room_book'] }}</td>
        </tr>
        <tr>
            <td>Jumlah Peserta </td>
            <td>:</td>
            <td>{{ $MailApprove['total_participant'] }}</td>
        </tr>
        <tr>
            <td>Jumlah Konsumsi </td>
            <td>:</td>
            <td>{{ $MailApprove['total_consumption'] }}</td>
        </tr>
        <tr>
            <td>Keterangan </td>
            <td>:</td>
            <td>{{ $MailApprove['annotation'] }}</td>
        </tr>
    </table>
    <p>Kami akan mempersiapkan ruang rapat sesuai dengan permintaan Anda. <br>
        Semua fasilitas dan peralatan yang diperlukan akan tersedia untuk memastikan keberhasilan acara Anda, <br>
        seperti: {{ $MailApprove['room_facility'] }}.</p>
    <p>
        Harap tiba tepat waktu pada tanggal dan waktu yang telah Anda tentukan. <br>
        Jika Anda memiliki pertanyaan lebih lanjut atau perlu melakukan perubahan pada pemesanan, <br>
        jangan ragu untuk menghubungi kami di (nomor telepon) atas nama (pemilik nomor telepon)
    </p>
    <p>Terima kasih,</p>
    <p>Admin {{ $MailApprove['admin_name'] }}</p>
</body>
</html>
