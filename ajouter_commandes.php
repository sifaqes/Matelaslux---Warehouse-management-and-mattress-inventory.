<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Matelaslux : Ajouter un produit&nbsp;<?php echo htmlentities($_SESSION['username']); ?></title>

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
}elseif ($access === $Admin6) {
  admin1();
}else {
  require_once'includes/header.php'; 
}
?>
<h4 class="container">Nouvelle Commande de <?php echo htmlentities($_SESSION['username'])?></h4>


<!-- -----------------------------------Ajouter commande PHP---------------------------------------------------------- -->
<?php 

if (isset($_POST['ajouter'])) {

    $userid = htmlentities($_SESSION['username']);
//     system de security only Admins can add items
    if ($userid === $Admin1 or $userid === $Admin2 or $userid === $Admin3 or $userid === $Admin4 or $userid === $Admin5 or $userid === $Admin6) {
        

        // قي حالة الطلب لاول مره فانه يزود القيمة rol بعدد اولي 1
    $user = $userid;
    if (empty($_POST['rol'])) {
        $rol = 1;
    }else {
        $rol = $_POST['rol'];
    } 
    

    $nom = openssl_encrypt($_POST['nom'],$crypting,$key,0,$iv);   
    $indi = openssl_encrypt($_POST['indi'],$crypting,$key,0,$iv);
    $tel = openssl_encrypt($_POST['tel'],$crypting,$key,0,$iv);
    $email = openssl_encrypt($_POST['email'],$crypting,$key,0,$iv);
    $fecha = date ('y-m-d');
    
//     $fecha = openssl_encrypt('2022-04-15',$crypting,$key,0,$iv);
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
    $prix = openssl_encrypt($_POST['prix'],$crypting,$key,0,$iv);
    $text = openssl_encrypt($_POST['text'],$crypting,$key,0,$iv);

    $track = openssl_encrypt($_POST['track'],$crypting,$key,0,$iv);
    $statue = openssl_encrypt($_POST['statue'],$crypting,$key,0,$iv);
    $liv = openssl_encrypt($_POST['liv'],$crypting,$key,0,$iv);
    $cupon = openssl_encrypt($_POST['cupon'],$crypting,$key,0,$iv);

    $AjouterCommande = $database->prepare("INSERT INTO commandes (user,rol,nom,indi,tel,email,fecha,dir,bat,port,ville,wilaya,
    postal,tipo,dim,hut,den,prix,text , track , statue,  liv, cupon) 
    VALUES( :user, :rol , :nom, :indi, :tel, :email, :fecha, :dir, :bat, :port, :ville, :wilaya, :postal, :tipo, :dim, :hut, :den,
     :prix, :text,  :track , :statue,  :liv, :cupon)");
    // INSERT USERID
    $AjouterCommande->bindParam("user",$user);
    $AjouterCommande->bindParam("rol",$rol);
    $AjouterCommande->bindParam("nom",$nom);
    $AjouterCommande->bindParam("indi",$indi);
    $AjouterCommande->bindParam("tel",$tel);
    $AjouterCommande->bindParam("email",$email);
    $AjouterCommande->bindParam("fecha",$fecha);
    $AjouterCommande->bindParam("dir",$dir);
    $AjouterCommande->bindParam("bat",$bat);
    $AjouterCommande->bindParam("port",$port);
    $AjouterCommande->bindParam("ville",$ville);
    $AjouterCommande->bindParam("wilaya",$wilaya);
    $AjouterCommande->bindParam("postal",$postal);
    $AjouterCommande->bindParam("tipo",$tipo);
    $AjouterCommande->bindParam("dim",$dim);
    $AjouterCommande->bindParam("hut",$hut);
    $AjouterCommande->bindParam("den",$den);
    $AjouterCommande->bindParam("prix",$prix);
    $AjouterCommande->bindParam("text",$text);
    $AjouterCommande->bindParam("track",$track);
    $AjouterCommande->bindParam("statue",$statue);
    $AjouterCommande->bindParam("liv",$liv);
    $AjouterCommande->bindParam("cupon",$cupon);

    if($AjouterCommande->execute()){
        // echo '
        //         <div class=" mt-2 alert alert-success container" role="alert">
        //                 nouvelle commande a été Ajouter&nbsp;!
        //         </div>';
        // SCRIPT EMAIL///////////////////////////////
        require_once 'mail.php';
        require_once 'includes/psl-config.php';

                $mail->addAddress($emailAdmin3);
                $mail->addCC($emailAdmin5);

                $usermail = htmlentities($_SESSION['username']);
                $admin_mail = $database->prepare("SELECT * FROM members where username = :username ");
                $admin_mail->bindParam("username",$usermail);
                if($admin_mail->execute()){
                        foreach($admin_mail AS $get_mail){
                        $mail->addBCC($get_mail['email']);
                        echo'<div class=" mt-2 alert alert-success container" role="alert">
                        nouvelle commande a été Ajouter&nbsp;!&nbsp;un&nbsp;email&nbsp;a&nbsp;été&nbsp;envoyer&nbsp;a&nbsp;'.$get_mail['email'].'&nbsp;!
                         </div>';
                        }}

                
                $mail->Subject = "Nouvell Commande Matelas par::".$user."";
                $mail->Body = '<div> 
                <div style="text-align: center;">
                        <h1>Une ommande '.$_POST['statue'].'</h1>
                        <img style="text-align: center;" src="'.$url.'imgs/logo.png" alt="logo">
                        <h3>Cette commande a été traitée par&nbsp;'.$user.'&nbsp;le jours&nbsp;'.$fecha.',&nbsp;Pour plus informations veuller connecter au  portal <a href="'.$url.'">Click Ici</a></h3>    
                </div>
                <p dir="rtl">قم بتسجيل الدخول من عرض معلومات الطلبية</p>
                <ul>
                        <li style="">Nom Prenom&nbsp;'.$_POST['nom'].'</li>
                        <li style="">Adresse&nbsp;'.$_POST['dir'].'&nbsp;'.$_POST['bat'].'&nbsp;'.$_POST['port'].'</li>
                        <li style="">Telephone&nbsp;'.$_POST['indi'].$_POST['tel'].'</li>
                        <li style="">Email&nbsp;'.$_POST['email'].'</li>
                        <li style="">Commande&nbsp;'.$_POST['tipo'].'&nbsp;'.$_POST['dim'].'&nbsp;'.$_POST['hut'].'&nbsp;'.$_POST['dir'].'den</li>
                        <li style="">Prix&nbsp;'.$_POST['prix'].'.00 DZD</li>
                <h3>Merci&nbsp;'.$user.'</h3>
                </div>';
                $mail->setFrom($mailsender, "NEW ORDRE::MATELASLUX");

                
                if ($mail->send()) {
                        echo'<div class=" mt-2 alert alert-success container" role="alert">
                        Un Email a ete envoyer a '.$emailAdmin3.'&nbsp;!&nbsp;et&nbsp;'.$emailAdmin5.'&nbsp;!
                        </div>';
                        // require_once './adminmail.php';
                }else {
                        echo'<div class=" mt-2 alert alert-danger container" role="alert">
                             EMAIL SEND FAIL '.$emailAdmin3.'&nbsp;!
                        </div>';
                }


                // header  refresh ----------------------------------------------------------
                header("location:protected_page.php",true);

        // echo '
        //         <div class=" mt-2 alert alert-success container" role="alert">
        //             Un Email a ete envoyer a '.$emailAdmin3.'&nbsp;!
        //         </div>';

        }else {
            echo '
                    <div class=" mt-2  alert alert-success container" role="alert">
                    Il a un Erreur de base de donnes!
                    </div>';  
                    header("location:ajouter_commandes.php",true);
        }

}else {
        echo'<div class="container alert-danger">Admin no es autorizado, contecter <a  href="tel:'.$telsystem.'">siphax</a> svp</div>';
}  

}

?>


<form method="POST">
            <div class="container ">
                        <ul class="nav justify-content-end">
                                <li class="nav-item">
                                
                                </li>
                                <li class="nav-item">Conferme&nbsp;
                                <a class=" btn btn-outline-warning" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16"><path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/></svg></a>
                                &nbsp;</li>
                                <li class="nav-item">Non Conferme&nbsp;
                                <a class="btn btn-outline-dark" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-down-fill" viewBox="0 0 16 16"><path d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.378 1.378 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51.136.02.285.037.443.051.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.896 1.896 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.856 0-.29-.036-.586-.113-.857a2.094 2.094 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.162 3.162 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28H8c-.605 0-1.07.08-1.466.217a4.823 4.823 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591z"/></svg></a>
                                &nbsp;</li>
                                
                                <li class="nav-item">Expédié&nbsp;
                                <a class="btn btn-outline-info" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16"><path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/></svg></a>
                                &nbsp;</li>
                                <li class="nav-item">Livré&nbsp;
                                <a class="btn btn-outline-success" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-heart-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.707L8 2.207l6.646 6.646a.5.5 0 0 0 .708-.707L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/><path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Zm0 5.189c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.691 0-5.018Z"/></svg></a>
                                &nbsp;</li>
                                <li class="nav-item">Annuler&nbsp;
                                <a class="btn btn-outline-danger" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-reply-all-fill" viewBox="0 0 16 16"><path d="M8.021 11.9 3.453 8.62a.719.719 0 0 1 0-1.238L8.021 4.1a.716.716 0 0 1 1.079.619V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/><path d="M5.232 4.293a.5.5 0 0 1-.106.7L1.114 7.945a.5.5 0 0 1-.042.028.147.147 0 0 0 0 .252.503.503 0 0 1 .042.028l4.012 2.954a.5.5 0 1 1-.593.805L.539 9.073a1.147 1.147 0 0 1 0-1.946l3.994-2.94a.5.5 0 0 1 .699.106z"/></svg></a>
                                &nbsp;</li>
                                <li class="nav-item">
                                <a class="nav-link disabled" aria-current="page" ><p class="fs-6 text-end " dir="rtl" >(*) حقل اجباري </p></a>
                                </li>
                        </ul>
                <div class="row g-3">

                    <!-- -------------------------UTILISATEUR------------------------------------- -->
                    <!-- <hr class="my-4"> -->
                    <!-- ------------------------------------------------------------------------ -->
                    <div class="col-sm-2">
                        <!-- <label  class="form-label">Utilisateur</label> -->
                                <input name="user" class="form-control" type="text" value="<?php echo htmlentities($_SESSION['username']); ?>" disabled required>
                    </div>
                    
                    <div class="col-sm-2">
                        <?php  
                        $userValor = htmlentities($_SESSION['username']);
                        $getRols = $database->prepare("SELECT rol,user FROM commandes  WHERE user = :user  ORDER BY rol DESC LIMIT 1 ; " );
                        
                        $getRols->bindParam("user",$userValor);
                        
                        if ($getRols ->execute()) {
                                // echo $userValor;
                                foreach($getRols AS $getRol){
                                                $getRol['rol'] = $getRol['rol'] +1  ;
                                                $valorFinal = $getRol['rol'];
                ?>  
                                                <!-- <label  class="form-label"><?php // echo 'CODE:'.$valorFinal ?></label> -->
                                                        <input name="rol" class="form-control" type="number" placeholder="كود الطلبية" value="<?php echo $valorFinal; ?>" maxlength="4" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"  required>
                                                        <?php 
                                
                        
                        }
                        }else {
                                echo'Selected fail';
                        }
                        
                        ?>
                      
                    
                    </div>
                        <div class="col-sm-8">
                                <!-- <label  class="form-label">Statue</label> -->
                                <select name="statue" class="form-select btn-outline-danger"  required>
                                        <option value="Conferme">Conferme</option>
                                        <option value="Non Confermer">Non Confermer</option>
                                        <!-- <option value="Expédié">Expédié</option>
                                        <option value="Livré">Livré</option>
                                        <option value="Annuler">Annuler</option> -->
                                        
                                </select>
                        </div>

                    <!-- -------------------------Contact    ----------------------------------- -->
                    <!-- <hr class="my-4"> -->
                    <!-- ------------------------------------------------------------------------ -->

                    <div  class="col-sm-5">
                            <!-- <label  class="form-label">Nom Prenom*</label> -->
                            <input name="nom" class="form-control"  type="text"  placeholder="الاسم و اللقب*" required> 
                    </div>
                    <div  class="col-sm-1">
                            <!-- <label  class="form-label">Indicateur*</label> -->
                            <select name="indi" class="form-select"  required>
                                <option value="+213">+213</option>
                            </select>  
                    </div>
                    <div class="col-sm-2">
                            <!-- <label  class="form-label">Telephone*</label> -->
                            <input name="tel" class="form-control"  type="text"  placeholder="*550693200"  maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required/>
                    </div>
                    <div class="col-sm-4">
                            <!-- <label  class="form-label">Email</label> -->
                            <input name="email" class="form-control"  type="text" placeholder="الايمايل"/>
                    </div>

                    <!-- -------------------------Adress de livarison---------------------------- -->
                    <!-- <hr class="my-4">                     -->
                    <!-- ------------------------------------------------------------------------ -->
                    <div class="col-sm-6">
                            <!-- <label  class="form-label">Adresse de laivraison*</label> -->
                            <input name="dir" class="form-control"  type="text" placeholder="*العنوان أو الشارع"  required/>
                    </div>

                    <div class="col-sm-2">
                            <!-- <label  class="form-label">Numero*</label> -->
                            <input name="bat" class="form-control"  type="text" placeholder="رقم المنزل"  disabled/>
                    </div>

                    <div class="col-sm-2">
                            <!-- <label  class="form-label">Porte</label> -->
                            <input name="port" class="form-control"  type="text" placeholder="الطابق او رقم الباب"  disabled/>
                    </div>
                    <div class="col-sm-2">
                            <!-- <label  class="form-label">Ville*</label> -->
                            <input name="ville" class="form-control"  type="text" placeholder="المدينة"  disabled/>
                    </div>
                    <div class="col-sm-6">
                            <!-- <label  class="form-label">Wilaya*</label> -->
                            <input name="wilaya" class="form-control"  type="text" placeholder="*الولاية"  required/>
                    </div>
                    <div class="col-sm-6">
                            <!-- <label  class="form-label">Code Postal</label> -->
                            <input name="postal" class="form-control"  type="text" placeholder="الرمز البريدي"  />
                    </div>
                    

                    <!-- -------------------------Commande matelaslux---------------------------- -->
                    <!-- <hr class="my-4">                     -->
                    <!-- ------------------------------------------------------------------------ -->

                    <div class="col-sm-3">
                            <label  class="form-label">Commande*</label>
                            <select name="tipo" class="form-select"  required>
                                    <option value="Pack Promo">Pack Promo</option>
                                    <option value="Pack Normal">Pack Normal</option>
                                    <option value="Oreiller">Oreiller</option>
                                    <option value="Couette">Couette</option>
                            </select>
                    </div>

                    <div class="col-sm-3">
                            <label  class="form-label">Dimention*</label>
                            <select name="dim" class="form-select"  required>
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
                            <label  class="form-label">Hauteur*</label>
                            <select name="hut" class="form-select"  required>
                                    <option value="20">20 cm</option>
                                    <option value="25">25 cm</option>
                            </select>
                    </div>
                    

                    <div class="col-sm-3">
                            <label  class="form-label">Densité*</label>
                            <select name="den" class="form-select"  required>
                                    <option value="D30">D30</option>
                                    <option value="D25">D25</option>
                            </select>
                    </div>


                <div class="col-sm-3">
                        <!-- <label  class="form-label">N.suivi</label> -->
                        <input name="track" type="track" class="form-control" placeholder="رقم التتبع">
                </div>
                <div class="col-sm-3">
                        <!-- <label  class="form-label">Livraison</label> -->
                        <input name="liv" type="text" class="form-control disabled"  placeholder="سعر الشحن" disabled >
                </div>
                <div class="col-sm-3">
                        <!-- <label  class="form-label">Coupons</label> -->
                        <input name="cupon" type="number" class="form-control" placeholder="التخفيض ان وجد" >
                </div>

                    <div class="col-sm-3">
                            <!-- <label  class="form-label">Prix*</label> -->
                            <input name="prix" type="number" class="form-control"  placeholder="*السعر الاجمالي" required>
                    </div>


                    <div class="col-sm-12">
                            <textarea dir="rtl"  name="text"  class="form-control mt-1 mb-1" rows="8" placeholder="Discripcion" >لا يوجد ملاحظة</textarea>
                    </div>
                    <!-- -------------------------Button ajouter--------------------------------- -->
                    <!-- <hr class="my-4">                       -->
                    <!-- ------------------------------------------------------------------------ -->
                    <button name="ajouter" type="submit" class="w-100 btn btn-outline-success btn-lg" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-up-fill" viewBox="0 0 16 16">
                        <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2z"/>
                        </svg>&nbsp;Ajouter une commande
                    </button>
                </div>         
            </div>
</form>

<?php require_once'includes/footer.php'; ?>
<!-- ---------------------------------END PROGRAM--------------------------------- -->
        <?php else : ?>
            <p>
                <span class="error">Vous n'êtes pas autorisé à accéder à cette page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
   
</html>





        
