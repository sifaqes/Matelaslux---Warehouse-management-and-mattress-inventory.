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
}elseif ($access === $Admin6) {
  admin1();
}else {
  require_once'includes/header.php'; 
}
?>


<h4 class="mb-3 container">Les Prix</h4>
<?php
// Acces Administrateur 
$access  = htmlentities($_SESSION['username']);
if ($access === $Admin1 or $access === $Admin2) {
?>
<div class="container" >

<table class="table">
  <thead>
    <tr>
      <th scope="col">Pack</th>
      <th scope="col">Dimensions </th>
      <th scope="col">Densité</th>
      <th scope="col">Prix</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">PackPromo</th>
      <td>190 x 140 x 20 cm</td>
      <td>Densité</td>
      <td>Prix</td>
    </tr>
  </tbody>
</table>














</div>
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
