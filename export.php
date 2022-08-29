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
    </head>
    <body>
        <?php if (login_check($mysqli) == true) : ?>
<!-- ---------------------------------STAR PROGRAM--------------------------------- -->
<?php require_once'includes/psl-config.php'; ?>

<?php
// Export Only custum XLS
if(isset($_GET['bordereau']) and isset($_GET['user'])){ 
    $ExportExel = $database->prepare("SELECT * FROM commandes WHERE id = :id");
    $ExportExel->bindParam("id",$_GET['bordereau']);
    if ($ExportExel->execute()) {
        echo '
         <table class="table table-striped" bordered="1">  
            <tr>  
                <th>Reference</th>  
                <th>Utilisateur</th>  
                <th>Rolde de page</th>  
                <th>Nom</th>   
                <th>Tel</th>  
                <th>Email</th>  
                <th>Date de commande</th>  
                <th>Adresse</th>  
                <th>Bat</th>  
                <th>Porte</th>  
                <th>Ville</th>  
                <th>Wilaya</th>  
                <th>C postal</th>  
                <th>Produit</th>  
                <th>Dimentions</th>  
                <th>Hauteur</th>  
                <th>Desite</th>  
                <th>Suivi</th>  
                <th>statue</th>  
                <th>Cout de laivraison</th>  
                <th>Vupon</th>  
                <th>prix</th>  
                <th>Note</th>  
                <th>Date Of Delivery</th>  
      
            </tr>';
        foreach($ExportExel AS $row){
        echo'<tr>  
                <td>'.$row["id"].'</td>  
                <td>'.$row["user"].'</td> 
                <td>'.openssl_decrypt($row["rol"],$crypting,$key,0,$iv).'</td>  
                <td>'.openssl_decrypt($row["nom"],$crypting,$key,0,$iv).'</td>   
                <td>'.openssl_decrypt($row["indi"],$crypting,$key,0,$iv).openssl_decrypt($row["tel"],$crypting,$key,0,$iv).'</td> 
                <td>'.openssl_decrypt($row["email"],$crypting,$key,0,$iv).'</td>
                <td>'.$row["fecha"].'</td> 
                <td>'.openssl_decrypt($row["dir"],$crypting,$key,0,$iv).'</td>  
                <td>'.openssl_decrypt($row["bat"],$crypting,$key,0,$iv).'</td> 
                <td>'.openssl_decrypt($row["port"],$crypting,$key,0,$iv).'</td>  
                <td>'.openssl_decrypt($row["ville"],$crypting,$key,0,$iv).'</td>  
                <td>'.openssl_decrypt($row["wilaya"],$crypting,$key,0,$iv).'</td>  
                <td>'.openssl_decrypt($row["postal"],$crypting,$key,0,$iv).'</td>  
                <td>'.openssl_decrypt($row["tipo"],$crypting,$key,0,$iv).'</td>  
                <td>'.openssl_decrypt($row["dim"],$crypting,$key,0,$iv).'</td>  
                <td>'.openssl_decrypt($row["hut"],$crypting,$key,0,$iv).'</td>  
                <td>'.openssl_decrypt($row["den"],$crypting,$key,0,$iv).'</td>  
                <td>'.openssl_decrypt($row["track"],$crypting,$key,0,$iv).'</td>  
                <td>'.openssl_decrypt($row["statue"],$crypting,$key,0,$iv).'</td>  
                <td>'.openssl_decrypt($row["liv"],$crypting,$key,0,$iv).'</td>  
                <td>'.openssl_decrypt($row["cupon"],$crypting,$key,0,$iv).'</td>  
                <td>'.openssl_decrypt($row["prix"],$crypting,$key,0,$iv).'</td> 
                <td>'.openssl_decrypt($row["text"],$crypting,$key,0,$iv).'</td>  
                <td>'.openssl_decrypt($row["dateofdelivery"],$crypting,$key,0,$iv).']</td>
            </tr>';
        }
        echo '</table>';
        $fecha = date('y-m-d h-m-s');
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=Bordoreaux_'.$fecha.'.xls');
} 
}
?>


<?php
// Export All Lista XLS EXCEL
if(isset($_POST["export"])){
$ExportExel = $database->prepare("SELECT * FROM commandes");
 if($ExportExel->execute())
 {
  echo '
   <table class="table table-striped" bordered="1">  
                    <tr>  
                        <th>Name</th>  
                        <th>Address</th>  
                        <th>City</th>  
                        <th>Postal Code</th>
                        <th>Postal Code</th>
                    </tr>
  ';
  foreach($ExportExel AS $row){
   echo '
                    <tr>  
                        <td>'.openssl_decrypt($row["dir"],$crypting,$key,0,$iv).''.openssl_decrypt($row["bat"],$crypting,$key,0,$iv).''.openssl_decrypt($row["port"],$crypting,$key,0,$iv).''.openssl_decrypt($row["ville"],$crypting,$key,0,$iv).'</td>  
                        <td>'.openssl_decrypt($row["wilaya"],$crypting,$key,0,$iv).''.openssl_decrypt($row["postal"],$crypting,$key,0,$iv).'</td>  
                        <td>'.openssl_decrypt($row["tipo"],$crypting,$key,0,$iv).''.openssl_decrypt($row["dim"],$crypting,$key,0,$iv).''.openssl_decrypt($row["hut"],$crypting,$key,0,$iv).''.openssl_decrypt($row["den"],$crypting,$key,0,$iv).'</td>  
                        <td>'.openssl_decrypt($row["track"],$crypting,$key,0,$iv).'</td>  
                        <td>'.openssl_decrypt($row["prix"],$crypting,$key,0,$iv).'</td> 
                    </tr>
   ';
  }
 echo '</table>';
    $fecha = date('y-m-d h-m-s');
    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=Bordoreaux_'.$fecha.'.xls');

 }
}
?>



<!-- ---------------------------------END PROGRAM--------------------------------- -->
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
</html>
