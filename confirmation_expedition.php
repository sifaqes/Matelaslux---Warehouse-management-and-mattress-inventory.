<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Matelaslux : Bonjour&nbsp;<?php echo htmlentities($_SESSION['username']); ?></title>
        <!-- Icon de main:apple windows android -->
        <link rel="icon" href="imgs\icon.png">
        <link rel="shortcut" href="imgs\icon.png">
        <link rel="apple-touche-icon" href="imgs\icon.png">

        <!-- SEO TAG FACEBOOK -->
        <meta property="og:title" content="Gestion Matelaslux">
        <meta property="og:description" content="<?php echo $Adresse; ?>">
        <meta property="og:image" content="imgs\icon.png">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="720">
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://crm.elbossinmobiliaria.es">
        <meta property="fb:app_id" content="xxxxxxxxxxxxxxxxxxxx">

        <!-- BOOTSTRAP -->
        <link href="styles/assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <?php if (login_check($mysqli) == true) : ?>
<!-- ---------------------------------STAR PROGRAM--------------------------------- -->
<?php 
//HEADER Acces Administrateur 
require_once'includes/psl-config.php';
$access  = htmlentities($_SESSION['username']);
if ($access === $Admin1 ) {
  admin1();
}elseif ($access === $Admin2) {
  admin2();
}elseif ($access === $Admin3) {
  admin3();
}elseif ($access === $Admin4) {
  admin4();
}elseif ($access === $Admin5) {
  admin5();
}else {
  require_once'includes/header.php'; 
}
?>
<h4 class="mb-3 container">Liste d'attente d'expédition</h4>



<?php
// Acces Administrateur 
$access  = htmlentities($_SESSION['username']);
if ($access === $Admin5 or $access === $Admin3) {

      if (isset($_GET['btn_conferme'])) {
          // Get variables
          $id = $_GET['btn_conferme'];
          $statue = openssl_encrypt('Expédié',$crypting,$key,0,$iv);
          // Call data base  
          $SendCommande = $database->prepare("UPDATE commandes SET  statue = :statue    WHERE id = :id ");
          // Securid
          $SendCommande->bindParam("id",$id);
          $SendCommande->bindParam("statue",$statue);
          // Execute data base
          if ($SendCommande->execute()) {
          // Call datos de data base dor display en email
          $id =  $_GET['btn_conferme'];
          $showinfo4 = $database->prepare("SELECT * FROM commandes WHERE id = :id");
          $showinfo4->bindParam('id',$id);
          // Convert array variable
          if ($showinfo4->execute()) {
            foreach($showinfo4 AS $showinfos4){ 
                  // SCRIPT EMAIL///////////////////////////////
                require_once 'mail.php';
                require_once 'includes/psl-config.php';
                $user= htmlentities($_SESSION['username']);
                $fechaemail = date ('y-m-d h:m:s');
                // Email youva  flash 19
                        // $mail->addAddress($emailAdmin4);
                        $mail->addAddress('zs7@gcloud.ua.es');
                        $mail->Subject = "::Commande Prêt à Expédier de :".$showinfos4['user'].'_'.$showinfos4['rol']."";
                        $mail->Body = '<div> 
                        <div style="text-align: center;">
                                <h1>Une dommande '.openssl_decrypt($showinfos4['statue'],$crypting,$key,0,$iv).'</h1>
                                <img style="text-align: center;" src="'.$url.'imgs/logo.png" alt="logo">
                                <h3>Reference de commande:&nbsp;'.$showinfos4['id'].'_'.$showinfos4['user'].'_'.$showinfos4['rol'].'</h3> 
                                <a href="'.$url.'/view_commandes.php?view='.$showinfos4['id'].'">
                                    <img style="margin: 2px 1em 0 auto;" src="'.$url.'/'.$hostingUrlimage.'/print.png" alt="print">
                                </a>
                                <h3>Imprimer l&#39;affiche Bordereau 
                                    <a href="'.$url.'/view_commandes.php?view='.$showinfos4['id'].'">
                                        Click Ici
                                    </a>
                                </h3>    
                        </div> 
                        <ul>
                                <li style=""><b>Date de commande</b>&nbsp;'.$showinfos4['fecha'].'</li>
                                <li style=""><b>Date de Confirmation de expedition</b>&nbsp;'.$fechaemail.'</li>
                                <li style=""><b>Nom Prenom</b>&nbsp;'.openssl_decrypt($showinfos4['nom'],$crypting,$key,0,$iv).'</li>
                                <li style=""><b>Adresse</b>&nbsp;'.openssl_decrypt($showinfos4['dir'],$crypting,$key,0,$iv).'&nbsp;'.openssl_decrypt($showinfos4['bat'],$crypting,$key,0,$iv).'&nbsp;'.openssl_decrypt($showinfos4['port'],$crypting,$key,0,$iv).'</li>
                                <li style=""><b>Telephone</b>&nbsp;'.openssl_decrypt($showinfos4['indi'],$crypting,$key,0,$iv).openssl_decrypt($showinfos4['tel'],$crypting,$key,0,$iv).'</li>
                                <li style=""><b>Email</b>&nbsp;'.openssl_decrypt($showinfos4['email'],$crypting,$key,0,$iv).'</li>
                                <li style=""><b>Commande</b>&nbsp;'.openssl_decrypt($showinfos4['tipo'],$crypting,$key,0,$iv).'&nbsp;'.openssl_decrypt($showinfos4['dim'],$crypting,$key,0,$iv).'&nbsp;'.openssl_decrypt($showinfos4['hut'],$crypting,$key,0,$iv).'&nbsp;'.openssl_decrypt($showinfos4['dir'],$crypting,$key,0,$iv).'den</li>
                                <li style=""><b>Prix</b>&nbsp;'.openssl_decrypt($showinfos4['prix'],$crypting,$key,0,$iv).'.00 DZD</li>
                        <h3>Merci&nbsp;'.$user.'</h3>
                        <h5 dir="rtl"> هاذ الايمايل فقط لتاكيد ان الطلب جاهز للارسال و هاذا بعد تاكيد الطلبية من طرف عمي عمر</h5>
                        </div>';
                        $mail->setFrom($mailsender, "MATELASLUX::EXPEDITION");
                        // Send Email
                        if ($mail->send()) {
                          echo'<div class="container  alert alert-success" role="alert">
                          La confirmation de la disponibilité à envoyer à l&#39;administrateur '.$Admin4.', Un email a etais envoyer avec succes a '.$emailAdmin4.'!
                              </div>';
                          
                        }else {
                          echo'<div class="container  alert alert-danger" role="alert">
                                FAIL SEND MAIL, svp contacter '.$Admin3.'!
                              </div>';
                        }
                      }
            }else {
            echo'<div class="container  alert alert-danger" role="alert">
            Erreur de contenue de email, Pour des raisons techniques. Contacter '.$Admin3.'!
          </div>';
          }
          // header("location:protected_page.php",true);
          }else {
            echo'<div class="container  alert alert-danger" role="alert">
            La préparation à l&#39;expédition n&#39;a pas été confirmée pour des raisons techniques. Contacter '.$Admin3.'!
          </div>';
          }
      }
?>




<?php 
// SCRIPT ESTADISTICAS ADMINS //////////////////////////////////////////////////////////////////////////////////////////////////////////////

$admin  = htmlentities($_SESSION['username']);
echo'<div class="container">';
// $Admin3='SF';


        
        // $infoday = $database->prepare("SELECT * FROM commandes WHERE fecha >= CURRENT_DATE -  INTERVAL 0 DAY");
        // $infoday1 = $database->prepare("SELECT * FROM commandes WHERE prix >= CURRENT_DATE -  INTERVAL 30 DAY");
        $statue =  openssl_encrypt('Conferme',$crypting,$key,0,$iv);
        $forShips = $database->prepare("SELECT * FROM commandes WHERE statue = :statue");
        $forShips->bindParam('statue',$statue);

        $listShip = $forShips->rowCount();
        if ($forShips->execute()) {
        echo'
        <div class="container ">
          <div class="row ">
              
                    ';
        foreach($forShips AS $forShip){ 
        echo'               <div class="col-4">
                                <div class="card border-success mb-3" style="max-width: 35rem;">
                                    <div class="card-header">
                                          REF: '.$forShip['id'].'_'.$forShip['user'].'_'.$forShip['rol'].'&#32;&#32;Date:&#32;'.$forShip['fecha'].'
                                    </div>
                                    <div class="card-body">
                                      <h5 class="card-title">
                                          <button name="remove" class="btn btn-danger mt-1" type="submit" value="'.$forShip['id'].'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg></button>
                                          <td>'.openssl_decrypt($forShip['nom'],$crypting,$key,0,$iv).'</td>
                                      </h5>
                                      <h6 class="card-title">
                                          
                                          <td><a class="nav-link btn" href="tel:'.openssl_decrypt($forShip['indi'],$crypting,$key,0,$iv).openssl_decrypt($forShip['tel'],$crypting,$key,0,$iv).'">0'.openssl_decrypt($forShip['tel'],$crypting,$key,0,$iv).'</a></td>
                                      </h6>
                                      <h6 class="card-title nav-link"> 
                                            <td ><B>Prix: </B>'.openssl_decrypt($forShip['prix'],$crypting,$key,0,$iv).',00 DZD</td>
                                      </h6>

                                      <h6 class="card-title"> 
                                          <td> 
                                              <a class="btn btn-outline-primary mt-1" type="button" href="view_commandes.php?view='.$forShip['id'].'" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16"><path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/><path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/></svg></a>
                                              <a class="btn btn-outline-secondary mt-1" type="button" href="edit_commandes.php?edit='.$forShip['id'].'&user='.$forShip['user'].'" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16"><path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/></svg></a>
                                          </td> 
                                      </h6>
                                      
                                      <form method="GET"> 
                                          <div class="d-grid gap-2"> 
                                                      <button name="btn_conferme" value="'.$forShip['id'].'" class="btn btn-outline-success mt-1">Attente d&#39;envoi</button>
                                          </div>
                                      </from>
                                  
                                    </div>
                              </div>
                          </div>
                        ';
        }
        echo'                
                  
                </div>
              </div>';
   


      }else {
      echo '<p class="bg-light border">Autorisation Editeur &nbsp;:&nbsp;'.$admin.'</p>';
      }
      echo'</div>';
?>





<?php
}else {
  echo"<div class='container alert-danger'>Vous n'avez pas la permission d'entrer</div>";
}
?>
<?php require_once'includes/footer.php'; ?>
<!-- ---------------------------------END PROGRAM--------------------------------- -->
        <?php else : ?>
            <p>
                <span class="error">Vous n'êtes pas autorisé à accéder à cette page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
</html>
