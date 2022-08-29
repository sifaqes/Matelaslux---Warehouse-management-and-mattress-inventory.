<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
?>

<?php if (login_check($mysqli) == true) : ?>


<?php 
 require_once'includes/psl-config.php';
// ------------------------------------Delete clients--------------------------------
if(isset($_GET["remove"])){
         $id = $_GET["remove"];
        $RemoveCommande = $database->prepare("DELETE FROM commandes WHERE id = :id");
        $RemoveCommande->bindParam("id",$id);
         echo $RemoveCommande->execute();
        //  header("Location:protected_page.php");
        
        echo "<script type='text/javascript'>window.top.location='protected_page.php';</script>"; exit;

}else {
   echo'Null';
//    echo $_GET["removee"];
}else : ?>
            <div class="alert alert-danger container d-print-none  mt-2" role="alert">
            Vous n'avez pas l'autorisation d'accéder à cette page ! S'il vous plait <a href="index.php">login</a>.
            </div>      
        <?php 
        endif; 
        ?>