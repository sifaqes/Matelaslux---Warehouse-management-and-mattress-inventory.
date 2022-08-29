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
<h4 class="mb-3 container">Profile</h4>









<?php 

$listusers = $database->prepare("SELECT rol,email,username FROM members   ");
if($listusers->execute()){
echo'<div class="container px-4">
<div class="row gx-5">';
foreach ($listusers  as $listuser ) {
 echo'


<div class="card mb-3 container bg-light border-dark" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="'.$url.'/imgs/profile.pmg" class="img-fluid rounded-start" alt="'.$url.'/imgs/profile.pmg">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Rol de compte: '.$listuser['rol'].'</h5>
        <p class="card-text">'.$listuser['email'].'</p>
        <p class="card-text"><small class="text-muted">Code de utilisateur: '.$listuser['username'].'</small></p>
';?>       



       <!-- Supprimer -->
        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-outline-danger" ><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg></button>
            
        <!-- Modal --> 


            <from method="GET">
            <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Supprimer le compte</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Vouler Vous Supprimer la compte?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuller</button>

                    <button type="submit" name="remove" class="btn btn-danger" formaction="eliminar.php?remove=00">Supprimer</button>
                </div>
                </div>
              </div>
              </div> </from>





        </div>
    </div>
  </div>
</div><?php
}echo'</div>
</div>';


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



}else {
?>
<div class=" container">
  <p class=" alert-danger">Il n'est pas possible de publier des employés</p>
</div>
<?php
}
?>




<?php 

if ($_POST['Supprimer']) {
  echo'Google ';
  header("location:protected_page.php",true);
}
?>






<!-- <div class="container">
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="<?php //echo $url; ?>/imgs/Carte-de-visite_1.pmg" class="d-block w-50" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Data1</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="<?php //echo $url; ?>/imgs/Carte-de-visite_2.pmg" class="d-block w-50" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Data2</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?php //echo $url; ?>/imgs/Carte-de-visite_2.pmg" class="d-block w-50" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Data3</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev bg-warning" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next bg-warning" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

</div> -->





  











<h5 class="mb-3 container text-center"> MATELASLUX العنوان التجاري</h5>
<h5 class="mb-3 container text-center">35000 تعاونية العقارية( ميموزة) حي الفواعيص مجمووعة ملكية 590 من القسم 4 برمرداس</h5>
<h5 class="mb-3 container text-center">Tel1: 0550 69 32 00</h5>
<h5 class="mb-3 container text-center">Tel3: 0556 61 28 40</h5>
<h5 class="mb-3 container text-center">Guid : MATL9IHFY</h5>
<h5 class="mb-3 container text-center">api : kCF3zlqz8swjrGqHD4vIFXLIunOifRXE3nP</h5>
<a href="https://maps.app.goo.gl/CtnwBPZMnLNKNt258" target="_blank"><h5 class="mb-3 container text-center">https://maps.app.goo.gl/CtnwBPZMnLNKNt258</h5></a>






<h5 class="mb-3 container text-end">Facture pdf <a class="nav-link"href="<?php echo $url.$hostingUrlimage; ?>/facture.pdf">Example a telecharger</a></h5>.




<div class="container overflow-hidden">
  <div class="row gx-5">
    <div class="col">
    <div class="p-3 border bg-light">
      <div class="card" style="width: 35rem;">
            <a href="<?php echo $url; ?>/imgs/Carte-de-visite_1.png" target="_blank"><img src="<?php echo $url; ?>/imgs/Carte-de-visite_1.png" class="card-img-top" alt="carte de visite"></a>
              <div class="card-body">
                <p class="card-text">تحميل البطاقة</p>
              </div>
      </div>
    </div>
    </div>
    <div class="col">
      <div class="p-3 border bg-light">

        <div class="card" style="width: 35rem;">
        <a href="<?php echo $url; ?>/imgs/Carte-de-visite_2.png" target="_blank"><img src="<?php echo $url; ?>/imgs/Carte-de-visite_2.png" class="card-img-top" alt="carte de visite"></a>
            <div class="card-body">
              <p class="card-text">تحميل البطاقة</p>
            </div>
        </div>

      </div>
    </div>
  </div>
</div>




</div>


















<?php require_once'includes/footer.php'; ?>
<!-- ---------------------------------END PROGRAM--------------------------------- -->
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
</html>
