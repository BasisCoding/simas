<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Register | Sistem Informasi Manajemen Sekolah</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="<?= base_url('assets/img/logo2.png') ?>" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?= base_url('assets/css/theme-default.css')?>"/>
        <!-- EOF CSS INCLUDE -->     
        
    </head>
    <body>
        
        <div class="login-container">
            <div class="login-box animated fadeInDown">
                
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title text-center"><strong>Basis</strong>Coding</div>
                    <form class="form-horizontal" id="form-register" method="POST">                        
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_lengkap">
                                <span class="nama-help text-danger" hidden>Nama Lengkap Wajib Diisi</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Username" name="username">
                                <span class="username-help text-danger" hidden>Username Sudah Tersedia</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="email" class="form-control" placeholder="Email" name="email" />
                                <span class="email-help text-danger" hidden>Email Sudah Tersedia</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="password" class="form-control" placeholder="Password" name="password" />
                                <span class="password-help text-danger" hidden>Password Wajib Diisi</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="password" class="form-control" name="konfirmasi" placeholder="Konfirmasi Password"/>
                                <span class="konfirmasi-help text-danger" hidden>Password Tidak Sama</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 text-right">
                                <button class="btn btn-info btn-block" type="submit" id="btn-register">Register</button>
                            </div>
                            <div class="col-md-6 text-center">
                                <a class="" href="<?= base_url('login') ?>">Sudah Punya Akun ?</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2019 BasisCoding
                    </div>
                    <div class="pull-right">
                        <a href="#">About</a> |
                        <a href="#">Privacy</a> |
                        <a href="#">Contact Us</a>
                    </div>
                </div>
            </div>
            <!-- danger with sound -->
        <div class="message-box message-box-success animated fadeIn" data-sound="alert" id="message-success">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-check"></span> SUKSES</div>
                    <div class="mb-content">
                        <p>Selamat Pendaftaran Anda Berhasil Silahkan Cek Email Untuk Aktivasi Akun Anda, Anda Akan Dialihkan dalam waktu 15 Detik</p>
                    </div>
                    <div class="mb-footer">
                        <button class="btn btn-default btn-lg pull-right mb-control-close">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="message-box message-box-error animated fadeIn" data-sound="fail" id="message-success">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-check"></span> GAGAL</div>
                    <div class="mb-content">
                        <p>Silahkan Coba Kembali Beberapa Saat</p>                    
                    </div>
                </div>
            </div>
        </div>
        <!-- end danger with sound -->
            <!-- START PRELOADS -->
        <audio id="audio-alert" src="<?= base_url('assets/audio/alert.mp3')?>" preload="auto"></audio>
        <audio id="audio-fail" src="<?= base_url('assets/audio/fail.mp3')?>" preload="auto"></audio>
        <!-- END PRELOADS -->   
        </div>
        <!-- START PLUGINS -->
        <script type="text/javascript" src="<?= base_url('assets/js/plugins/jquery/jquery.min.js')?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/plugins/jquery/jquery-ui.min.js')?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/plugins/bootstrap/bootstrap.min.js')?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/plugins.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/actions.js') ?>"></script>
        <!-- END PLUGINS -->
        <script type="text/javascript">
            $(function() {
                function cek_register(key, kelas) {
                    $.ajax({
                        url: '<?= site_url('Register/cek_register') ?>',
                        type: 'POST',
                        dataType: 'JSON',
                        data:{key:key},
                        success:function(response) {
                            if (response.status == 'error') {
                                $(kelas).removeAttr('hidden');
                            }
                        }
                    });
                }

                $('[name="username"]').keyup(function() {
                    var kelas = '.username-help';
                    var key = $(this).val();
                    cek_register(key, kelas);
                    return false;
                });

                $('[name="email"]').keyup(function() {
                    var kelas = '.email-help';
                    var key = $(this).val();
                    cek_register(key, kelas);
                    return false;
                });

                $('#form-register').on('submit', function() {
                    var login = '<?= site_url('Login') ?>';
                    if ($('[name="nama_lengkap"]').val().length == 0) {
                        $('.nama-help').removeAttr('hidden');
                        return false;
                    }
                    if ($('[name="konfirmasi"]').val() != $('[name="password"]').val()) {
                        $('.konfirmasi-help').removeAttr('hidden');
                        return false;
                    }
                    if ($('[name="password"]').val().length == 0) {
                        $('.password-help').removeAttr('hidden');
                        return false;
                    }
                    $.ajax({
                        url: '<?= base_url('Email/send') ?>',
                        type: 'POST',
                        data: $(this).serialize(),
                        beforeSend: function()
                        { 
                            $("#btn-register").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
                        },
                        success:function(response) {
                            $('.message-box-success').addClass('open');
                            playAudio('alert');
                            setTimeout(function(){ 
                              window.location.href = login;
                            }, 1500);
                        }
                    });

                    return false;
                });
            });
        </script>
    </body>
</html>






