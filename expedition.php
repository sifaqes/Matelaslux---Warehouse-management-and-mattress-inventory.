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

<h4 class="mb-3 container">Expedition Nord Ouest</h4>

<?php
// Acces Administrateur 
$access  = htmlentities($_SESSION['username']);
if ($access === $Admin4 or $access === $Admin3 ) {

      if (isset($_GET['btn_Livré'])) {
          // Get variables
          $id1 = $_GET['btn_Livré'];
          $track = openssl_encrypt($_GET['suivi'],$crypting,$key,0,$iv);
          $statue = openssl_encrypt('Livré',$crypting,$key,0,$iv);
          $dateofdelivery =  date ('y-m-d h:m:s');
          // Call data base  
          $SendCommande = $database->prepare("UPDATE commandes  SET track = :track , statue = :statue , dateofdelivery = :dateofdelivery   WHERE id = :id1 ");
          // Securid
          $SendCommande->bindParam("id1",$id1);
          $SendCommande->bindParam("track",$track);
          

          $SendCommande->bindParam("statue",$statue);
          $SendCommande->bindParam("dateofdelivery",$dateofdelivery);
          // Execute data base
          if ($SendCommande->execute()) {
          // Call datos de data base dor display en email
          $id =  $_GET['btn_Livré'];
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
                        $mail->addAddress($emailAdmin5);
                        $mail->Subject = "::Commande à êtê Livré par youva:".$showinfos4['user'].'_'.$showinfos4['rol']."";
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
                        $mail->setFrom($mailsender, "MATELASLUX::COMMANDE ENVOYER");
                        
                        if ($mail->send()) {
                          echo'<div class="container  alert alert-success" role="alert">
                          La confirmation de la Expedition à envoyer à l&#39;administrateur '.$Admin5.'! Un email a été envoyer a '.$emailAdmin5.'!
                        </div>';
                          
                        }else {
                          echo'<div class="container  alert alert-danger" role="alert">
                          Operation no reussit!
                        </div>';
                          
                        }
                        ;
                      }
            }else {
            echo'<div class="container  alert alert-danger" role="alert">
            Erreur de contenue de email, Pour des raisons techniques. Contacter '.$Admin3.'!
          </div>';
          }
        //   header("location:protected_page.php",true);
          }else {
            echo'<div class="container  alert alert-danger" role="alert">
            La préparation à l&#39;Livraison n&#39;a pas été confirmée pour des raisons techniques. Contacter '.$Admin3.'!
          </div>';
          }
      }
?>




<?php 
// SCRIPT ESTADISTICAS ADMINS //////////////////////////////////////////////////////////////////////////////////////////////////////////////

$admin  = htmlentities($_SESSION['username']);
echo'<div class="container">';
// $Admin3='SF';

      // if ($admin === $Admin4  ) {
        
        // $infoday = $database->prepare("SELECT * FROM commandes WHERE fecha >= CURRENT_DATE -  INTERVAL 0 DAY");
        // $infoday1 = $database->prepare("SELECT * FROM commandes WHERE prix >= CURRENT_DATE -  INTERVAL 30 DAY");
        $statue =  openssl_encrypt('Expédié',$crypting,$key,0,$iv);
        $forShips = $database->prepare("SELECT * FROM commandes WHERE statue = :statue");
        $forShips->bindParam('statue',$statue);

        $listShip = $forShips->rowCount();
        if ($forShips->execute()) {

echo' 
        <form method="post" action="export.php">
              <div class=" text-end">
                    <td><input type="submit" name="export" class="btn btn-success" value="Export All" /></td>
              </div>
        </form>';

        foreach($forShips AS $forShip){ 
        echo '
<div class="card border-success mt-2">
    <div class="card-header ">  
        <header>
              <b>'.$forShip['id'].'_'.$forShip['user'].'_'.$forShip['rol'].'</b>
              &nbsp;&nbsp;&nbsp;&nbsp;'.$forShip['fecha'].'</td>
              
             
   
        </header>
      </div>
    <div class="card-body">
         
               <div class="container">
                     <form method="GET"><div class="row ">
                          <div class="col-2"> 
                          '.openssl_decrypt($forShip['nom'],$crypting,$key,0,$iv).'</td>
                          </div>
                          <div class="col-3"> 
                              <a class="btn btn-outline-primary" type="button" href="view_commandes.php?view='.$forShip['id'].'" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16"><path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/><path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/></svg></a>
                              <a class="btn btn-outline-secondary " type="button" href="edit_commandes.php?edit='.$forShip['id'].'&user='.$forShip['user'].'" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16"><path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/></svg></a>
                              <a class="btn border-danger" href="tel:'.openssl_decrypt($forShip['indi'],$crypting,$key,0,$iv).openssl_decrypt($forShip['tel'],$crypting,$key,0,$iv).'">0'.openssl_decrypt($forShip['tel'],$crypting,$key,0,$iv).'</a>
                              </div>
                          <div class="col-3"> 
                                <input name="suivi" class="form-control" type="text" value="'.openssl_decrypt($forShip['track'],$crypting,$key,0,$iv).'">
                          </div>
                          <div class="col-4"> 
                              <a class="btn btn-outline-success " type="submit" href="export.php?bordereau='.$forShip["id"].'&user='.$forShip['user'].'" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-font-fill" viewBox="0 0 16 16"><path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM5.057 6h5.886L11 8h-.5c-.18-1.096-.356-1.192-1.694-1.235l-.298-.01v5.09c0 .47.1.582.903.655v.5H6.59v-.5c.799-.073.898-.184.898-.654V6.755l-.293.01C5.856 6.808 5.68 6.905 5.5 8H5l.057-2z"/></svg></a>  
                              <button name="btn_Livré" value="'.$forShip['id'].'" class="btn btn-success ">Expédié par nord-ouest</button>
                          </div>
                    </div></from>
                    <div class="row mt-3">
                          <div class="  col-3"> 
                          '.openssl_decrypt($forShip['dir'],$crypting,$key,0,$iv).' '.openssl_decrypt($forShip['bat'],$crypting,$key,0,$iv).' '.openssl_decrypt($forShip['port'],$crypting,$key,0,$iv).' '.openssl_decrypt($forShip['ville'],$crypting,$key,0,$iv).' '.openssl_decrypt($forShip['wilaya'],$crypting,$key,0,$iv).' '.openssl_decrypt($forShip['postal'],$crypting,$key,0,$iv).'
                          </div>
                          <div class="  col-2"> 
                          '.openssl_decrypt($forShip['text'],$crypting,$key,0,$iv).'
                          </div>
                          <div class="  col-3"> 
                                '.openssl_decrypt($forShip['tipo'],$crypting,$key,0,$iv).' '.openssl_decrypt($forShip['dim'],$crypting,$key,0,$iv).' '.openssl_decrypt($forShip['hut'],$crypting,$key,0,$iv).' '.openssl_decrypt($forShip['den'],$crypting,$key,0,$iv).'
                          </div>
                          <div class="  col-2"> 
                                <B >Total: '.openssl_decrypt($forShip['prix'],$crypting,$key,0,$iv).',00 DZD</B>
                          </div>
                      </div>
                </div>
                   
      </div>
</div>
        ';




        }
      }


      // }else {
      // echo '<p class="bg-light border">Autorisation Editeur &nbsp;:&nbsp;'.$admin.'</p>';
      // }
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
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
</html>
