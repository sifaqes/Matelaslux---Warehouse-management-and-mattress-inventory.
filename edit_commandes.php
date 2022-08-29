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
        <meta property="og:url" content="https://crm.elbossinmobiliaria.com">
        <meta property="fb:app_id" content="xxxxxxxxxxxxxxxxxxxx">

        <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

   
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
}elseif ($access === $Admin6) {
  admin1();
}else {
  require_once'includes/header.php'; 
}
?>
<h4 class="mb-3 container"><a class="nav-link" href="<?php echo $url;  ?>/edit_commande.php?edit=<?php echo $_GET['edit'];  ?>&user=<?php echo $_GET['user'];  ?>">Reference ID :&nbsp;<?php echo $_GET['edit'];  ?></a></h4>


<?php 
// ------------------------------------Delete clients--------------------------------
if(isset($_POST['remove'])){
        $id = $_GET['edit'];
        $RemoveCommande = $database->prepare("DELETE FROM commandes WHERE id = :id");
        $RemoveCommande->bindParam('id',$id);
        if ($RemoveCommande->execute()) {
               echo'<div class="alert alert-success container" role="alert">
               La commande referance '.$id.' a ete supprimer!
               </div>';
               header("location:protected_page.php",true);
                // header("Refresh:2");
                // exit;

        }else {
                echo'<div class="alert alert-danger container" role="alert">
                Il a un erreur !
                </div>';
                // header("Refresh:1");
        }
}
?>



<?php
        if(isset($_POST['update'])){

            $rol = $_POST['rol'];
            $statue = openssl_encrypt($_POST['statue'],$crypting,$key,0,$iv);
            $nom = openssl_encrypt($_POST['nom'],$crypting,$key,0,$iv);   
            $indi = openssl_encrypt($_POST['indi'],$crypting,$key,0,$iv);
            $tel = openssl_encrypt($_POST['tel'],$crypting,$key,0,$iv);
            $email = openssl_encrypt($_POST['email'],$crypting,$key,0,$iv);
            $fecha = $_POST['fecha'];
            $dir = openssl_encrypt($_POST['dir'],$crypting,$key,0,$iv);
            $bat = openssl_encrypt($_POST['bat'],$crypting,$key,0,$iv);
            $port = openssl_encrypt($_POST['port'],$crypting,$key,0,$iv);
            $ville = openssl_encrypt($_POST['ville'],$crypting,$key,0,$iv);
            $wilaya = openssl_encrypt($_POST['wilaya'],$crypting,$key,0,$iv);
            $postal = openssl_encrypt($_POST['postal'],$crypting,$key,0,$iv);
            $tipo = openssl_encrypt($_POST['tipo'],$crypting,$key,0,$iv);
            $dim = openssl_encrypt($_POST['dim'],$crypting,$key,0,$iv);
            $hut = openssl_encrypt($_POST['hut'],$crypting,$key,0,$iv);
            $den = openssl_encrypt($_POST['den'],$crypting,$key,0,$iv);
            $text = openssl_encrypt($_POST['text'],$crypting,$key,0,$iv);
            $track = openssl_encrypt($_POST['track'],$crypting,$key,0,$iv);
            $liv = openssl_encrypt($_POST['liv'],$crypting,$key,0,$iv);
            $cupon = openssl_encrypt($_POST['cupon'],$crypting,$key,0,$iv);
            $prix = openssl_encrypt($_POST['prix'],$crypting,$key,0,$iv);


            $EditCommande = $database->prepare("UPDATE commandes SET rol = :rol , nom = :nom ,indi = :indi , tel = :tel ,email = :email ,fecha = :fecha , dir = :dir , bat = :bat , port = :port , ville = :ville , wilaya = :wilaya ,
            postal = :postal , tipo = :tipo , dim = :dim , hut = :hut , den = :den , prix = :prix , text = :text , track = :track , statue = :statue ,  liv = :liv , cupon = :cupon   WHERE id = :id ");
            // INSERT USERID
            $EditCommande->bindParam("id",$_GET['edit']);
            $EditCommande->bindParam("rol",$rol);
            $EditCommande->bindParam("nom",$nom);
            $EditCommande->bindParam("indi",$indi);
            $EditCommande->bindParam("tel",$tel);
            $EditCommande->bindParam("email",$email);
            $EditCommande->bindParam("fecha",$fecha);
            $EditCommande->bindParam("dir",$dir);
            $EditCommande->bindParam("bat",$bat);
            $EditCommande->bindParam("port",$port);
            $EditCommande->bindParam("ville",$ville);
            $EditCommande->bindParam("wilaya",$wilaya);
            $EditCommande->bindParam("postal",$postal);
            $EditCommande->bindParam("tipo",$tipo);
            $EditCommande->bindParam("dim",$dim);
            $EditCommande->bindParam("hut",$hut);
            $EditCommande->bindParam("den",$den);
            $EditCommande->bindParam("prix",$prix);
            $EditCommande->bindParam("text",$text);
        
            $EditCommande->bindParam("track",$track);
            $EditCommande->bindParam("statue",$statue);
            $EditCommande->bindParam("liv",$liv);
            $EditCommande->bindParam("cupon",$cupon);
             //   var_dump($EditCommande);   //Devlopers
            if ($EditCommande->execute()) {
                echo'
                </div>
                    <div class="alert alert-success container mt-3 " role="alert">
                    Mise a jours avec secces!
                    </div>
                ';
                header("Location: edit_commandes.php?edit=".$_POST['edit']."&user=".$_POST['user']);
            }else {
                echo'
                </div>
                    <div class="alert alert-danger container mt-3" role="alert">
                    Erreur de enregistrement des donnes!
                    </div>
                ';
                header("Location: edit_commandes.php?edit=".$_POST['edit']."&user=".$_POST['user']);
            }  
        }

        ?>






<?php
// SCRIPT CLICK EDIT BUTTON////////////////////////////////////////////////////////////////////////////////////////
if(isset($_GET['edit']) and isset($_GET['user'])){
$getProduct = $database->prepare("SELECT * FROM commandes  WHERE id = :id and user = :user " );
$getProduct->bindParam("id",$_GET['edit']);
$getProduct->bindParam("user",$_GET['user']);


if ($getProduct->execute()) {

echo'<form method="POST">
        <div class="container">
            <div class="row g-3">
    ';

    foreach($getProduct AS $data){

    echo'                
                    <div class="nav justify-content-center gap-4"  >
                        <a class="btn btn-outline-primary " type="button" href="suivi.php?user='.$data['id'].'&utilisateur='.$data['user'].'&num='.$data['rol'].'&name='.openssl_decrypt($data['nom'],$crypting,$key,0,$iv).'" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16"><path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/></svg></a>
     '; 

        $super = htmlentities($_SESSION['username']);
     if ($super ===  $data['user']) {
        echo'<!-- Supprimer -->
        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-outline-danger" ><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg></button>
            <!-- Modal --> 
            <from method="GET">
            <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Supprimer la commande '.$data['id'].'</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Vouler Vous Supprimer la commande? 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuller</button>

                    <button type="submit" name="remove" class="btn btn-danger" formaction="eliminar.php?remove='.$data['id'].'">Supprimer</button>
                </div>
                </div>
            </div>
            </div> </from>';
     }else {
        echo'<!-- Supprimer -->
        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-outline-danger disabled" ><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg></button>
            <!-- Modal --> 
            <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Vouler Vous Supprimer la commande?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    <button type="submit" name="remove" class="btn btn-primary" formaction="eliminar.php?remove='.$data['id'].'"   >Eliminar</button>
                </div>
                </div>
            </div>
            </div> ';
     }
     echo'                   

                        
   
                        <a class="btn btn-outline-primary" type="button" href="view_commandes.php?view='.$data['id'].'" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16"><path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/><path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/></svg></a>
                        <a name="whatsapp" class="btn btn-outline-success" type="button" href="https://wa.me/'.openssl_decrypt($data['indi'],$crypting,$key,0,$iv).openssl_decrypt($data['tel'],$crypting,$key,0,$iv).'" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16"><path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/></svg></a>                      
                        <a name="viber" class="btn btn-outline-info" type="button" href="https://msng.link/o/?'.openssl_decrypt($data['indi'],$crypting,$key,0,$iv).openssl_decrypt($data['tel'],$crypting,$key,0,$iv).'=vi" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-messenger" viewBox="0 0 16 16"><path d="M0 7.76C0 3.301 3.493 0 8 0s8 3.301 8 7.76-3.493 7.76-8 7.76c-.81 0-1.586-.107-2.316-.307a.639.639 0 0 0-.427.03l-1.588.702a.64.64 0 0 1-.898-.566l-.044-1.423a.639.639 0 0 0-.215-.456C.956 12.108 0 10.092 0 7.76zm5.546-1.459-2.35 3.728c-.225.358.214.761.551.506l2.525-1.916a.48.48 0 0 1 .578-.002l1.869 1.402a1.2 1.2 0 0 0 1.735-.32l2.35-3.728c.226-.358-.214-.761-.551-.506L9.728 7.381a.48.48 0 0 1-.578.002L7.281 5.98a1.2 1.2 0 0 0-1.735.32z"/></svg></a> 
 
                        <td> ';
                              $etas = openssl_decrypt($data['statue'],$crypting,$key,0,$iv);
                              if ($etas === "Conferme") {
                              echo' <button class="btn btn-warning "><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16"><path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/></svg></button>';                    
                              }elseif ($etas === "Non Confermer") {
                                  echo ' <button class="btn btn-dark "><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-hand-thumbs-down-fill" viewBox="0 0 16 16"><path d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.378 1.378 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51.136.02.285.037.443.051.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.896 1.896 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.856 0-.29-.036-.586-.113-.857a2.094 2.094 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.162 3.162 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28H8c-.605 0-1.07.08-1.466.217a4.823 4.823 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591z"/></svg></button>'; 
                              } elseif ($etas === "Expédié") {
                                  echo ' <button class="btn btn-info "><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16"><path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/></svg></button>'; 
                              } elseif ($etas === "Livré") {
                                  echo ' <button class="btn btn-success "><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-house-heart-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.707L8 2.207l6.646 6.646a.5.5 0 0 0 .708-.707L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/><path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Zm0 5.189c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.691 0-5.018Z"/></svg></button>'; 
                              }elseif($etas === "Annuler") {
                                  echo '<button class="btn btn-danger "><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-reply-all-fill" viewBox="0 0 16 16"><path d="M8.021 11.9 3.453 8.62a.719.719 0 0 1 0-1.238L8.021 4.1a.716.716 0 0 1 1.079.619V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/><path d="M5.232 4.293a.5.5 0 0 1-.106.7L1.114 7.945a.5.5 0 0 1-.042.028.147.147 0 0 0 0 .252.503.503 0 0 1 .042.028l4.012 2.954a.5.5 0 1 1-.593.805L.539 9.073a1.147 1.147 0 0 1 0-1.946l3.994-2.94a.5.5 0 0 1 .699.106z"/></svg></button>'; 
                              }       
                              echo'
                        </td>                            
                    </div>

                    <div class="col-sm-3">
                        <label  class="form-label">Ref ID</label>
                        <input class="form-control" type="text"  value="'.$data['id'].'_'.$data['user'].'" disabled>
                    </div>

                    <div class="col-sm-1">
                        <label  class="form-label">Eg.KHA108</label>
                        <input class="form-control" type="number" name="rol" value="'.$data['rol'].'">
                    </div>

                    <div class="col">';
                    // ADMIN 5 MON PERE 
                       $status_of_ordre = htmlentities($_SESSION['username']);
                    if ($status_of_ordre === $Admin5) {
                      echo'
                      <label  class="form-label">Etas de commande</label>
                      <select class=" form-select btn btn-warning"  type="text" name="statue" >
                          <option value="'.openssl_decrypt($data['statue'],$crypting,$key,0,$iv).'">'.openssl_decrypt($data['statue'],$crypting,$key,0,$iv).'</option>
                          <option value="Non Confermer">Non Confermer</option>
                          <option value="Conferme">Conferme</option>
                          <option value="Expédié">Expédié</option>
                     </select>
                      ';  
                     }
                     // ADMIN 4 YOUVA
                        $status_of_ordre = htmlentities($_SESSION['username']);
                     if ($status_of_ordre === $Admin4) {
                       echo'
                       <label  class="form-label">Etas de commande</label>
                       <select class=" form-select btn btn-warning"  type="text" name="statue" >
                           <option value="'.openssl_decrypt($data['statue'],$crypting,$key,0,$iv).'">'.openssl_decrypt($data['statue'],$crypting,$key,0,$iv).'</option>
                           <option value="Livré">Livré</option>
                           <option value="Annuler">Annuler</option>
                      </select>
                       ';  
                      }
                      // ADMIN 3 SIPHAX
                         $status_of_ordre = htmlentities($_SESSION['username']);
                      if ($status_of_ordre === $Admin3) {
                        echo'
                        <label  class="form-label">Etas de commande</label>
                        <select class=" form-select btn btn-warning"  type="text" name="statue" >
                            <option value="'.openssl_decrypt($data['statue'],$crypting,$key,0,$iv).'">'.openssl_decrypt($data['statue'],$crypting,$key,0,$iv).'</option>
                            <option value="Non Confermer">Non Confermer</option>
                          <option value="Conferme">Conferme</option>
                       </select>
                        ';  
                       }
                       // ADMIN 2 KH2
                          $status_of_ordre = htmlentities($_SESSION['username']);
                       if ($status_of_ordre === $Admin2) {
                         echo'
                         <label  class="form-label">Etas de commande</label>
                         <select class=" form-select btn btn-warning"  type="text" name="statue" >
                             <option value="'.openssl_decrypt($data['statue'],$crypting,$key,0,$iv).'">'.openssl_decrypt($data['statue'],$crypting,$key,0,$iv).'</option>
                             <option value="Non Confermer">Non Confermer</option>
                           <option value="Conferme">Conferme</option>
                        </select>
                         ';  
                        }
                        // ADMIN 1 KH1
                           $status_of_ordre = htmlentities($_SESSION['username']);
                        if ($status_of_ordre === $Admin1) {
                          echo'
                          <label  class="form-label">Etas de commande</label>
                          <select class=" form-select btn btn-warning"  type="text" name="statue" >
                              <option value="'.openssl_decrypt($data['statue'],$crypting,$key,0,$iv).'">'.openssl_decrypt($data['statue'],$crypting,$key,0,$iv).'</option>
                              <option value="Non Confermer">Non Confermer</option>
                            <option value="Conferme">Conferme</option>
                         </select>
                          ';  
                         }
                         // ADMIN 6 SN
                            $status_of_ordre = htmlentities($_SESSION['username']);
                         if ($status_of_ordre === $Admin6) {
                           echo'
                           <label  class="form-label">Etas de commande</label>
                           <select class=" form-select btn btn-warning"  type="text" name="statue" >
                               <option value="'.openssl_decrypt($data['statue'],$crypting,$key,0,$iv).'">'.openssl_decrypt($data['statue'],$crypting,$key,0,$iv).'</option>
                               <option value="Non Confermer">Non Confermer</option>
                             <option value="Conferme">Conferme</option>
                          </select>
                           ';  
                          }



   

                echo'
                    </div>
                    <div class="col-sm-4">
                        <label  class="form-label">Date de livraison</label>
                        
                        <input class="form-control" type="date" name="fecha" value="'.$data['fecha'].'"  >
                    </div>
                    

                    <div class="col-sm-4">
                    <label  class="form-label">Nom Prenom</label>
                    <input class="form-control" type="text" name="nom" value="'.openssl_decrypt($data['nom'],$crypting,$key,0,$iv).'" >
                    </div>

                    <div class="col-sm-1">
                    <label  class="form-label">*</label>
                    <input class="form-control" type="text" name="indi" value="'.openssl_decrypt($data['indi'],$crypting,$key,0,$iv).'" >
                    </div>

                    <div class="col-sm-3">
                    <label  class="form-label">Telephone</label>
                    <input class="form-control" type="text" name="tel" value="'.openssl_decrypt($data['tel'],$crypting,$key,0,$iv).'"  maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" >
                    </div>


                    <div class="col-sm-4">
                    <label  class="form-label">Email</label>
                        <input class="form-control" type="email" name="email" value="'.openssl_decrypt($data['email'],$crypting,$key,0,$iv).'" >
                    </div>
                    <div class="col-sm-4">
                    <label  class="form-label">Adresse</label>
                        <input class="form-control" type="text" name="dir" value="'.openssl_decrypt($data['dir'],$crypting,$key,0,$iv).'" >
                    </div>
                    
                    <div class="col-sm-1">
                    <label  class="form-label">Numero</label>
                        <input class="form-control" type="text" name="bat" value="'.openssl_decrypt($data['bat'],$crypting,$key,0,$iv).'" >
                    </div>
                    
                    <div class="col-sm-1">
                    <label  class="form-label">Porte</label>
                        <input class="form-control" type="text" name="port" value="'.openssl_decrypt($data['port'],$crypting,$key,0,$iv).'" >
                    </div>
                    
                    <div class="col-sm-2">
                    <label  class="form-label">Ville</label>
                        <input class="form-control" type="text" name="ville" value="'.openssl_decrypt($data['ville'],$crypting,$key,0,$iv).'" >
                    </div>
                    
                    <div class="col-sm-3">
                    <label  class="form-label">Wilaya</label>
                        <input class="form-control" type="text" name="wilaya" value="'.openssl_decrypt($data['wilaya'],$crypting,$key,0,$iv).'" >
                    </div>
                    
                    <div class="col-sm-1">
                    <label  class="form-label">C.Postal</label>
                        <input class="form-control" type="text" name="postal" value="'.openssl_decrypt($data['postal'],$crypting,$key,0,$iv).'" >
                    </div>

                



                <div class="col-sm-3 ">
                <label  class="form-label">Offre</label>
                    <select class=" form-select" name="tipo">
                        <option value="'.openssl_decrypt($data['tipo'],$crypting,$key,0,$iv).'">'.openssl_decrypt($data['tipo'],$crypting,$key,0,$iv).'</option>
                        <option value="Pack Promo">Pack Promo(Matelas + 3 Oreiller + couette)</option>
                        <option value="Matelas">Matelas</option>
                        <option value="Oreiller">Oreiller</option>
                        <option value="Couette">Couette</option>
                    </select>
                </div>

                <div class="col-sm-3">
                <label  class="form-label">Dimensions</label>                    
                    <select class="form-select " name="dim" required>
                        <option value="'.openssl_decrypt($data['dim'],$crypting,$key,0,$iv).'">'.openssl_decrypt($data['dim'],$crypting,$key,0,$iv).' cm</option>
                        <option value="180 x 65">180 x 65 cm</option>
                        <option value="190 x 70">190 x 70 cm</option>
                        <option value="190 x 80">190 x 80 cm</option>
                        <option value="190 x 90">190 x 90 cm</option>
                        <option value="190 x 120">190 x 120 cm</option>
                        <option value="190 x 140">190 x 140 cm</option>
                        <option value="190 x 160">190 x 160 cm</option>
                        <option value="190 x 180">190 x 180 cm</option>
                        <option value="200 x 160">200 x 160 cm</option>
                        <option value="200 x 180">200 x 180 cm</option>
                        <option value="200 x 200">200 x 200 cm</option>
                    </select>
                </div>
                    
                <div class="col-sm-3">
                <label  class="form-label">Hauteur</label>
                    <select name="hut" class="form-select"  required>
                        <option value="'.openssl_decrypt($data['hut'],$crypting,$key,0,$iv).'">'.openssl_decrypt($data['hut'],$crypting,$key,0,$iv).' cm</option>
                        <option value="20">20 cm</option>
                        <option value="25">25 cm</option>
                    </select>
                </div>
                    
                <div class="col-sm-3"> 
                <label  class="form-label">Densité</label>
                     <select name="den" class="form-select"  required>
                        <option value="'.openssl_decrypt($data['den'],$crypting,$key,0,$iv).'">'.openssl_decrypt($data['den'],$crypting,$key,0,$iv).'</option>
                        <option value="D30">D30</option>
                        <option value="D25">D25</option>
                    </select>
                </div>



                <div class="col-sm-3">
                <label  class="form-label">N suivi</label>
                    <input class="form-control" type="text" name="track" value="'.openssl_decrypt($data['track'],$crypting,$key,0,$iv).'" >
                </div>
                <div class="col-sm-3">
                <label  class="form-label">Frais de laivraison</label>
                    <input class="form-control" type="text" name="liv" value="'.openssl_decrypt($data['liv'],$crypting,$key,0,$iv).'" >
                </div>
                <div class="col-sm-3">
                <label  class="form-label">Remise</label>
                    <input class="form-control" type="text" name="cupon" value="'.openssl_decrypt($data['cupon'],$crypting,$key,0,$iv).'" >
                </div>
                <div class="col-sm-3">
                <label  class="form-label">Total a  paye</label>
                    <input class="form-control" type="text" name="prix" value="'.openssl_decrypt($data['prix'],$crypting,$key,0,$iv).'" >
                </div>


                <div class="col">
                    <textarea dir="rtl" class="form-control " name="text" id="" cols="30" rows="16">'.openssl_decrypt($data['text'],$crypting,$key,0,$iv).'</textarea>
                </div>

                <div class="d-grid gap-2">

                    <button class="btn btn-success " type="submit" name="update" value="'.$data['id'].'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-upload" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"/><path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z"/></svg>
                    </button>
                
                </div>




            ';

        }
echo '    
        </div>
    </div>
</form>';
?>




<?php
    
    }else {
            echo '<div class="alert alert-danger container py-3" role="alert">
            Error de comunicacion de base de datos!
    </div>';
    }
}else {
    echo '

    <div class="alert alert-danger container py-3" role="alert">
        Lien nest pas valide, Verifier S.V.P! 
        <a href="protected_page.php" class="" type="submit" >aquí</a> 
     </div>';
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
