<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Joli Admin - Responsive Bootstrap Admin Template</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?= base_url('assets/css/theme-default.css')?>"/>
        <!-- EOF CSS INCLUDE -->     
        
    </head>
    <body>
        
        <div class="login-container">
            <div class="login-box animated fadeInDown">
               <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <?= $status ?>
                </div>
            </div>
        </div>
    </body>

    <script type="text/javascript">
            setTimeout(function(){ 
              window.location.href = '<?= site_url("Login") ?>';
            }, 1500);
    </script>
</html>






