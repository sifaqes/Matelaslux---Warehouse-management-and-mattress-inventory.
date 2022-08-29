<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<?php  


    // SCRIPT EMAIL///////////////////////////////
    require_once 'mail.php';
            $mail->setFrom('zs7@gcloud.ua.es', "MATELASLUX ALGERIE");
            $mail->addAddress('elbossinmobiliaria@gmail.com');
            $mail->Subject = "Etudes en Espagne - تم التسجيل  في الدورة بنجاح";
            $mail->Body = '
            <!-- CSS only -->

            
            <p class="alert alert-success" role="alert">
                مرحبا هادا الايمايل فقط للتجربة MATELASLUX ALGERIE
            </div>
            
            ';

            $mail->addEmbeddedImage('./assets/brand/logo.jpg', 'logo', 'logo.jpg');
            
if ($mail->send()) {
   echo'            <p class="alert alert-success container mt-2" role="alert">
   SEND EMAIL
    </div>';
}else {
    echo'<p class="alert alert-success container mt-2" role="alert">
    CANT SEND EMAIL
    </div>';
}


?>
