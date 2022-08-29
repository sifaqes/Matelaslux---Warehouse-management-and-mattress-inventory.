<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $_GET['view'] ?> Commande Matelaslux</title>
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

<div class="d-print-none"> 
<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link" href="protected_page.php"><img src="imgs/logo.png" alt="imgs/logo.png"></a>
    
  </li>
</ul>

<h4 class="container">Commande id :&nbsp;<?php echo $_GET['view'];  ?></h4>


<?php
// ///////////////////////////////////VIEW PHP////////////////////////////////////////
if(isset($_GET['view'])){
    $ViewCommandes = $database->prepare("SELECT * FROM commandes  WHERE id = :id");
    $ViewCommandes->bindParam("id",$_GET['view']);
        if ($ViewCommandes->execute()) {

            foreach($ViewCommandes AS $data){
            $admin =    openssl_decrypt($data['statue'],$crypting,$key,0,$iv);
                echo'
<div class="container ">
      <div class="row g-1 mt-2">
        <div class="col-sm-3 text-center border p-1 bg-light">
         Reference&nbsp;'.$_GET['view'].'_'.$data['user'].'_'.$data['rol'].'
        </div>
        <div class="col-sm-3 text-center border p-1 bg-light">
         Commande:&nbsp;';
            $etas = openssl_decrypt($data['statue'],$crypting,$key,0,$iv);
            if ($etas === $Estado1) {
            echo'&nbsp;<a class="btn btn-warning ">'.openssl_decrypt($data['statue'],$crypting,$key,0,$iv).'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16"><path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/></svg></a>';                    
            }elseif ($etas === $Estado2) {
                echo '&nbsp;<a class="btn btn-dark ">'.openssl_decrypt($data['statue'],$crypting,$key,0,$iv).'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-down-fill" viewBox="0 0 16 16"><path d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.378 1.378 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51.136.02.285.037.443.051.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.896 1.896 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.856 0-.29-.036-.586-.113-.857a2.094 2.094 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.162 3.162 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28H8c-.605 0-1.07.08-1.466.217a4.823 4.823 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591z"/></svg></a>'; 
            } elseif ($etas === $Estado3) {
                echo '&nbsp;<a class="btn btn-info ">'.openssl_decrypt($data['statue'],$crypting,$key,0,$iv).'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16"><path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/></svg></a>'; 
            } elseif ($etas === $Estado4) {
                echo '&nbsp;<a class="btn btn-success">'.openssl_decrypt($data['statue'],$crypting,$key,0,$iv).'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" fill="currentColor" class="bi bi-house-heart-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.707L8 2.207l6.646 6.646a.5.5 0 0 0 .708-.707L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/><path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Zm0 5.189c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.691 0-5.018Z"/></svg></a>'; 
            }elseif($etas === $Estado4) {
                echo '&nbsp;<a class="btn btn-danger ">'.openssl_decrypt($data['statue'],$crypting,$key,0,$iv).'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="32" fill="currentColor" class="bi bi-reply-all-fill" viewBox="0 0 16 16"><path d="M8.021 11.9 3.453 8.62a.719.719 0 0 1 0-1.238L8.021 4.1a.716.716 0 0 1 1.079.619V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/><path d="M5.232 4.293a.5.5 0 0 1-.106.7L1.114 7.945a.5.5 0 0 1-.042.028.147.147 0 0 0 0 .252.503.503 0 0 1 .042.028l4.012 2.954a.5.5 0 1 1-.593.805L.539 9.073a1.147 1.147 0 0 1 0-1.946l3.994-2.94a.5.5 0 0 1 .699.106z"/></svg></a>'; 
            }       
            echo'
        </div>
        <div class="col-sm-3 text-center border p-1 bg-light">
         Date&nbsp;:&nbsp;'.$data['fecha'].'
        </div>
        <div class="col-sm-3 text-center border p-1 bg-light">';

        if (empty(openssl_decrypt($data['track'],$crypting,$key,0,$iv))) {
            echo'رقم التتبع غير متوفر';
        }else {
            echo'N.Suivi&nbsp;:&nbsp;'.openssl_decrypt($data['track'],$crypting,$key,0,$iv).'';
        }


        echo'
        </div>
        <div class="col-sm-4 text-center border p-1">
          Nom Prenom&nbsp;:&nbsp;'.openssl_decrypt($data['nom'],$crypting,$key,0,$iv).'
        </div>
        <div class="col-sm-4 text-center border p-1">
          Telephone&nbsp;:&nbsp;'.openssl_decrypt($data['indi'],$crypting,$key,0,$iv).''.openssl_decrypt($data['tel'],$crypting,$key,0,$iv).'
        </div>
        <div class="col-sm-4 text-center border  p-1">';
        
        if(empty(openssl_decrypt($data['email'],$crypting,$key,0,$iv))){
            echo'لايوجد بريد الكتروني';
        }else {
        echo'
            Email&nbsp;:&nbsp;'.openssl_decrypt($data['email'],$crypting,$key,0,$iv).'   
        ';
        }
         echo'
        </div>
        <div class="col-sm-12 text-center border border p-1 bg-light">
        <h6><b>'.openssl_decrypt($data['dir'],$crypting,$key,0,$iv).'&nbsp;'.openssl_decrypt($data['bat'],$crypting,$key,0,$iv).'&nbsp;'.openssl_decrypt($data['port'],$crypting,$key,0,$iv).'&nbsp;'.openssl_decrypt($data['ville'],$crypting,$key,0,$iv).'&nbsp;'.openssl_decrypt($data['wilaya'],$crypting,$key,0,$iv).'&nbsp;'.openssl_decrypt($data['postal'],$crypting,$key,0,$iv).'</b></h6>
        </div>
        
        <div class="col-sm-4 text-center  p-1 ">
        <h6>'.openssl_decrypt($data['tipo'],$crypting,$key,0,$iv).'&nbsp;'.openssl_decrypt($data['dim'],$crypting,$key,0,$iv).'&nbsp;x&nbsp;'.openssl_decrypt($data['hut'],$crypting,$key,0,$iv).'&nbsp;cm&nbsp;'.openssl_decrypt($data['den'],$crypting,$key,0,$iv).'</h6>
        </div>

        <div class="col-sm-2 text-center  p-1 ">
            Coupon&nbsp;:&nbsp;'.openssl_decrypt($data['cupon'],$crypting,$key,0,$iv).'&nbsp;DZD
        </div>   
        <div class="col-sm-3 text-center  p-1 ">
            Laivraison&nbsp;:&nbsp;'.openssl_decrypt($data['liv'],$crypting,$key,0,$iv).'&nbsp;DZD
        </div>

        <div class="col-sm-3 text-center  p-1 ">
        <h5> <b>Total a Paye&nbsp;:&nbsp;'.openssl_decrypt($data['prix'],$crypting,$key,0,$iv).'&nbsp;DZD</b></h5>
        </div>

        <textarea dir="rtl" class="form-control"name="" id="" cols="30" rows="15" disabled>'.openssl_decrypt($data['text'],$crypting,$key,0,$iv).'</textarea>
      </div>
</div>


                ';
        }

    }else {
    echo'
    <div class="alert alert-danger container" role="alert">
    Erreur lors de la execution à la base de données !
    </div>
    ';
}
}else {
    echo'
    <div class="alert alert-danger container" role="alert">
    Erreur lors de la connexion à la base de données !
    </div>
    ';
}

?>
<div class="container alert-warning text-center  mt-3">Adresse comerciale <?php echo $Adresse.'&nbsp;email&nbsp;'.$emailhosting.'&nbsp;tel&nbsp;'.$telsystem ?> </div>

<div class="d-print-none"> 
<?php require_once'includes/footer.php'; ?>
</div>
<!-- ---------------------------------END PROGRAM--------------------------------- -->
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
</html>
