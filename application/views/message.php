<html>
<head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
</head>
<body>
    <div style="float: left;margin-right: 10px;">
        <img src="cid:logo_basiscoding" alt="Logo" style="height: 50px">
    </div>
    <h2 style="margin-bottom: 0;">BasisCoding</h2>
    https://www.basiscoding.org
    <div style="clear: both"></div>
    <hr />
    <div style="text-align: justify">
        <?php echo $pesan; // Tampilkan isi pesan ?>

        <br>
        Berikut ini Data anda yang sudah kami terima, silahkan untuk di konfirmasi dengan cara klik link aktivasi.
        <br>
        Nama Lengkap    : <?= $nama_lengkap ?><br>
        Email    : <?= $email ?><br>
        Username    : <?= $username ?><br>
        Password    : <?= $password ?><br>
        Kode Aktivasi    : <?= site_url('email/aktivasi/'.$kode) ?><br>
    </div>
</body>
</html>