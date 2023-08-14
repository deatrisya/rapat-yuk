<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>rapat yuk | pesanan ditolak</title>
</head>
<body>
    <h2>{{ $MailReject['title'] }}</h2>
    <h3>Kepada {{ $MailReject['receiver'] }}</h3>
    <p>Kami ingin memberitahukan bahwa kami telah meninjau pemesanan ruang rapat Anda yang diajukan untuk tanggal {{ $MailReject['date_book'] }}. <br>
        Namun, dengan menyesal kami harus memberitahukan bahwa pemesanan Anda telah kami tolak dengan alasan: {{ $MailReject['reason_rejected'] }} <br>
        Kami mohon maaf atas ketidaknyamanan yang mungkin timbul akibat keputusan ini. <br>
        Kami berharap Anda memahami bahwa keputusan ini diambil setelah pertimbangan yang matang untuk memastikan ketersediaan ruang rapat <br>
        dan fasilitas yang sesuai dengan kebutuhan Anda.
    </p>
    <p>Jika Anda memiliki pertanyaan lebih lanjut atau ingin membahas alternatif lain, kami dengan senang hati akan membantu Anda. <br>
        Silakan hubungi kami nomor telepon kami di (Nomor Telepon) pada jam kerja.</p>
    <p>
        Terima kasih atas perhatian Anda. Kami berharap dapat melayani Anda di kesempatan lain.
    </p>
    <p>Hormat kami,</p>
    <p>Admin {{ $MailReject['admin_name'] }}</p>
</body>
</html>
