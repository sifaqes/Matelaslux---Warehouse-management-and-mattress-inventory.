<?php 
require_once'includes/psl-config.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>suivi de commande <?php echo  openssl_decrypt($_GET['name'],$crypting,$key,0,$iv )?> </title>        
        <!-- Icon de main:apple windows android -->
        <link rel="icon" href="imgs\icon.png">
        <link rel="shortcut" href="imgs\icon.png">
        <link rel="apple-touche-icon" href="imgs\icon.png">

        <!-- SEO TAG FACEBOOK -->
        <meta property="og:title" content="Suivi de Commande::Matelaslux">
        <meta property="og:description" content="<?php echo $Adresse; ?>">
        <meta property="og:image" content="imgs\icon.png">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="720">
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://crm.elbossinmobiliaria.com">
        <meta property="fb:app_id" content="xxxxxxxxxxxxxxxxxxxx">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    </head>
    <body class="bg-light">
    <div class=" container">







<?php 

if (isset($_GET['user']) && isset($_GET['utilisateur']) && isset($_GET['num'])  && isset($_GET['name'])) {
    ?> 

<br>
<div class="text-center ">
     <a href="https://www.matelaslux.com" target="_blank"><img src="<?php echo $url ?>/imgs/tracking.png" class="img-fluid " alt="logo"></a>
</div>

<div>
    <h5 dir="rtl" class=" text-center">يمكنك تتبع طلبيتك بكل سهولة <?php echo $_GET['name'];?></h5>
</div>
    <?php 
    $utilisateur = $_GET['utilisateur'];
    $num = $_GET['num'];
    $id = $_GET['user'];
    $commandeestas = $database->prepare("SELECT wilaya,fecha,statue,id,dateofdelivery,track FROM commandes  WHERE id = :id");
    $commandeestas->bindParam("id",$id);
    if ($commandeestas->execute()) {
        foreach($commandeestas AS $data){
    echo'
    <div class=" clearfix">
        <p  class="btn btn-light float-start">Boumerdes</p>

        <p  class="btn btn-ligh float-end">'.openssl_decrypt($data['wilaya'],$crypting,$key,0,$iv).'</p>
    </div>
    ';
// -----------------------------------------------PROGRESS BAR------------------------------------------
    $conferme = openssl_decrypt($data['statue'],$crypting,$key,0,$iv);
    $progress1 = '10';
    $progress2 = '43';
    $progress3 = '67';
    $progress4 = '95';
    $progress5 = '1';
    if ($conferme  === $Estado1) {
        echo'
        <div class="progress container">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: '.$progress1.'%"></div>
            '.$progress1.'%</div>';
            
            echo'
            <ul class="nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link disabled">تم انشاء طلبية جديدة في '.$data['fecha'].'</a>
                </li>
            </ul>';
        
    }elseif ($conferme  === $Estado2 ) {
        echo'
        <div class="progress container">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: '.$progress2.'%"></div>
            '.$progress2.'%</div>';
            
            echo'
            <ul class="nav justify-content-center">
            <li class="nav-item">
            <a class="nav-link disabled">تم انشاء طلبية جديدة في '.$data['fecha'].'</a>
                </li>
            </ul>';
            
            echo'
            <ul class="nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link disabled">تم تاكيد الطلبية من طرف الزبون</a>
                </li>
            </ul>';

    }elseif ($conferme  === $Estado3 ) {
        echo'
        <div class="progress container">
            <div class="progress-bar progress-bar-striped progress-bar-animated  bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: '.$progress3.'%"></div>
            '.$progress3.'%</div>';
            
            echo'
            <ul class="nav justify-content-center">
            <li class="nav-item">
            <a class="nav-link disabled">تم انشاء طلبية جديدة في '.$data['fecha'].'</a>
                </li>
            </ul>';
            
            echo'
            <ul class="nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link disabled">تم تاكيد الطلبية من طرف الزبون</a>
                </li>
            </ul>';

        echo'
            <ul class="nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link disabled">الطلبية في مرحلة التغليف و الاعداد</a>
                </li>
            </ul>';

    }elseif ($conferme  === $Estado4 ) {
        echo'
        <div class="progress container">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: '.$progress4.'%"></div>
            '.$progress4.'%</div>';
            
            echo'
            <ul class="nav justify-content-center">
            <li class="nav-item">
            <a class="nav-link disabled">تم انشاء طلبية جديدة في '.$data['fecha'].'</a>
                </li>
            </ul>';
            
            echo'
            <ul class="nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link disabled">تم تاكيد الطلبية من طرف الزبون</a>
                </li>
            </ul>';

        echo'
            <ul class="nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link disabled">الطلبية في مرحلة التغليف و الاعداد</a>
                </li>
            </ul>';

            echo'
                <ul class="nav justify-content-center">
                <li class="nav-item">
                  <a class="nav-link disabled">تم الخروج من مخازن ماطلالوكس يوم '.$data['dateofdelivery'].'</a>
                    </li>
                </ul>';

                echo'
                    <ul class="nav justify-content-center">
                    <li class="nav-item">
                      <a class="nav-link disabled">'.date("y-m-d").' سوف يتم التسلبم في ظرف يوم أو يومين من </a>
                      </li>
                    </ul>
                               ';
                    
            
    }elseif ($conferme  === $Estado5 ) {
        echo'
        <div class="progress container">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: '.$progress5.'%"></div>
            '.$progress5.'%</div>';
            
            echo'
            <ul class="nav justify-content-center">
            <li class="nav-item">
            <a class="nav-link disabled">تم انشاء طلبية جديدة في '.$data['fecha'].'</a>
                </li>
            </ul>';
            
            echo'
            <ul class="nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link disabled">تم تاكيد الطلبية من طرف الزبون</a>
                </li>
            </ul>';

        echo'
            <ul class="nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link disabled">الطلبية في مرحلة التغليف و الاعداد</a>
                </li>
            </ul>';

            echo'
                <ul class="nav justify-content-center">
                <li class="nav-item">
                  <a class="nav-link disabled">تم الخروج من مخازن ماطلالوكس يوم '.$data['dateofdelivery'].'</a>
                    </li>
                </ul>';

                echo'
                    <ul class="nav justify-content-center">
                    <li class="nav-item">
                      <a class="nav-link disabled">سوف يتم التسليم في ضرف يوم أو يومين</a>
                        </li>
                    </ul>';

                echo'
                    <ul class="nav justify-content-center">
                    <li class="nav-item">
                      <a class="nav-link disabled">تم الغاء الطلبية</a>
                        </li>
                    </ul>';



    }
    ?>
    


<?php  } ?>

<H3>Votre Information</H3>
<?php 
// ---------------------------------------------------TABLE--------------------------------------------
        echo '
    <table class="table table-responsive text-center">
    
      <tbody>
        <tr>
          <th >Reference</th>
          <th>'.$utilisateur.'_'.$num.'</th>
        </tr>
        <tr>
          <th >Etas de commande</th>
          <th>'.openssl_decrypt($data['statue'],$crypting,$key,0,$iv).'</th>
        </tr>
        <tr>
            <th >Distination</th>
            <th>'.openssl_decrypt($data['wilaya'],$crypting,$key,0,$iv).'</th>
        </tr>
        <tr>
            <th >Numero de Suive</th>
            <th>';
            if (empty(openssl_decrypt($data['track'],$crypting,$key,0,$iv))) {
                echo'غير متوفر';
            }else {
                echo openssl_decrypt($data['track'],$crypting,$key,0,$iv);
            }

            
            echo'
            </th>
        </tr>
    
      </tbody>
    </table>
    '; 
    }
    
}

?> 













<!-- ---------------------------------------------Contact Admin------------------------------------ -->
<h4 class=" text-center">Consulter le service après vente</h4>
<?php
if ( $_GET['utilisateur'] == $Admin1) {
    echo '<h5 class=" text-center"> Votre Manager est Mdm.Khadidja1</h5>';
}elseif ( $_GET['utilisateur'] == $Admin2) {
    echo '<h5 class=" text-center">Votre Manager est Mdm.Khadidja2</h5>';
}elseif ( $_GET['utilisateur'] == $Admin3) {
    echo '<h5 class=" text-center">Votre Manager est Mr.Siphax</h5>';
}elseif ( $_GET['utilisateur'] == $Admin4) {
    echo '<h5 class=" text-center">Votre Manager est Mr.Omar</h5>';
}elseif ( $_GET['utilisateur'] == $Admin5) {
    echo '<h5 class=" text-center">Votre Manager est Mr.Youva</h5>';
}
?>

<?php
// ------------------------------------------CARD WHATAPP--------------------------------------------
$varuser= $_GET['num'];
$varid = $_GET['utilisateur'];

?>
<ul class="nav justify-content-center">
  <li class="nav-item">    
            <div  class="card border-primary mb-3  justify-content-center" style="max-width: 18rem;">
        <div class="card-header text-center text-primary">
        <h5 dir="rtl" class="card-title  text-center">قم بتاكيد الوصول</h5> 
        </div>
            <div class="card-body text-primary">

                <p class="card-text text-center"><a href="">
                <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" fill="currentColor" class="bi bi-fingerprint" viewBox="0 0 16 16">
                        <path d="M8.06 6.5a.5.5 0 0 1 .5.5v.776a11.5 11.5 0 0 1-.552 3.519l-1.331 4.14a.5.5 0 0 1-.952-.305l1.33-4.141a10.5 10.5 0 0 0 .504-3.213V7a.5.5 0 0 1 .5-.5Z"/>
                        <path d="M6.06 7a2 2 0 1 1 4 0 .5.5 0 1 1-1 0 1 1 0 1 0-2 0v.332c0 .409-.022.816-.066 1.221A.5.5 0 0 1 6 8.447c.04-.37.06-.742.06-1.115V7Zm3.509 1a.5.5 0 0 1 .487.513 11.5 11.5 0 0 1-.587 3.339l-1.266 3.8a.5.5 0 0 1-.949-.317l1.267-3.8a10.5 10.5 0 0 0 .535-3.048A.5.5 0 0 1 9.569 8Zm-3.356 2.115a.5.5 0 0 1 .33.626L5.24 14.939a.5.5 0 1 1-.955-.296l1.303-4.199a.5.5 0 0 1 .625-.329Z"/>
                        <path d="M4.759 5.833A3.501 3.501 0 0 1 11.559 7a.5.5 0 0 1-1 0 2.5 2.5 0 0 0-4.857-.833.5.5 0 1 1-.943-.334Zm.3 1.67a.5.5 0 0 1 .449.546 10.72 10.72 0 0 1-.4 2.031l-1.222 4.072a.5.5 0 1 1-.958-.287L4.15 9.793a9.72 9.72 0 0 0 .363-1.842.5.5 0 0 1 .546-.449Zm6 .647a.5.5 0 0 1 .5.5c0 1.28-.213 2.552-.632 3.762l-1.09 3.145a.5.5 0 0 1-.944-.327l1.089-3.145c.382-1.105.578-2.266.578-3.435a.5.5 0 0 1 .5-.5Z"/>
                        <path d="M3.902 4.222a4.996 4.996 0 0 1 5.202-2.113.5.5 0 0 1-.208.979 3.996 3.996 0 0 0-4.163 1.69.5.5 0 0 1-.831-.556Zm6.72-.955a.5.5 0 0 1 .705-.052A4.99 4.99 0 0 1 13.059 7v1.5a.5.5 0 1 1-1 0V7a3.99 3.99 0 0 0-1.386-3.028.5.5 0 0 1-.051-.705ZM3.68 5.842a.5.5 0 0 1 .422.568c-.029.192-.044.39-.044.59 0 .71-.1 1.417-.298 2.1l-1.14 3.923a.5.5 0 1 1-.96-.279L2.8 8.821A6.531 6.531 0 0 0 3.058 7c0-.25.019-.496.054-.736a.5.5 0 0 1 .568-.422Zm8.882 3.66a.5.5 0 0 1 .456.54c-.084 1-.298 1.986-.64 2.934l-.744 2.068a.5.5 0 0 1-.941-.338l.745-2.07a10.51 10.51 0 0 0 .584-2.678.5.5 0 0 1 .54-.456Z"/>
                        <path d="M4.81 1.37A6.5 6.5 0 0 1 14.56 7a.5.5 0 1 1-1 0 5.5 5.5 0 0 0-8.25-4.765.5.5 0 0 1-.5-.865Zm-.89 1.257a.5.5 0 0 1 .04.706A5.478 5.478 0 0 0 2.56 7a.5.5 0 0 1-1 0c0-1.664.626-3.184 1.655-4.333a.5.5 0 0 1 .706-.04ZM1.915 8.02a.5.5 0 0 1 .346.616l-.779 2.767a.5.5 0 1 1-.962-.27l.778-2.767a.5.5 0 0 1 .617-.346Zm12.15.481a.5.5 0 0 1 .49.51c-.03 1.499-.161 3.025-.727 4.533l-.07.187a.5.5 0 0 1-.936-.351l.07-.187c.506-1.35.634-2.74.663-4.202a.5.5 0 0 1 .51-.49Z"/>
                </svg>
                </a></p>
            </div>
        </div>
  </li>
  <li class="nav-item ms-3">    
            <div  class="card border-danger  mb-3  justify-content-center" style="max-width: 18rem;">
        <div class="card-header text-danger">
        <h5 dir="rtl" class="card-title  text-center">قم بتبليغ عن تأخير</h5>
        </div>
            <div class="card-body text-danger ">

                <?php 
                
                if ($_GET['utilisateur'] ===$Admin1) {
                    echo'<p class="card-text text-center"><a href="https://api.whatsapp.com/send?phone='.$Whatsapp1.'&text=Bonjour,%20je%20veux%20savoir%20où%20ma%20commande%20est%20arrivée%20jusqu&#39;à%20présent,%20Reference%20'.$varid.'_'.$varuser.'"  target="_blank"><svg class=" text-danger" xmlns="http://www.w3.org/2000/svg" width="96" height="96" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16"><path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/></svg></a></p>';
                }elseif ($_GET['utilisateur'] ===$Admin2) {
                    echo'<p class="card-text text-center"><a href="https://api.whatsapp.com/send?phone='.$Whatsapp2.'&text=Bonjour,%20je%20veux%20savoir%20où%20ma%20commande%20est%20arrivée%20jusqu&#39;à%20présent,%20Reference%20'.$varid.'_'.$varuser.'" target="_blank"><svg class=" text-danger" xmlns="http://www.w3.org/2000/svg" width="96" height="96" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16"><path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/></svg></a></p>';
                   
                }elseif ($_GET['utilisateur'] ===$Admin3) {
                    echo'<p class="card-text text-center"><a href="https://api.whatsapp.com/send?phone='.$Whatsapp3.'&text=Bonjour,%20je%20veux%20savoir%20où%20ma%20commande%20est%20arrivée%20jusqu&#39;à%20présent,%20Reference%20'.$varid.'_'.$varuser.'" target="_blank"><svg class=" text-danger" xmlns="http://www.w3.org/2000/svg" width="96" height="96" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16"><path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/></svg></a></p>';
                   
                }elseif ($_GET['utilisateur'] ===$Admin4) {
                    echo'<p class="card-text text-center"><a href="https://api.whatsapp.com/send?phone='.$Whatsapp4.'&text=Bonjour,%20je%20veux%20savoir%20où%20ma%20commande%20est%20arrivée%20jusqu&#39;à%20présent,%20Reference%20'.$varid.'_'.$varuser.'" target="_blank"><svg class=" text-danger" xmlns="http://www.w3.org/2000/svg" width="96" height="96" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16"><path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/></svg></a></p>';
                    
                }elseif ($_GET['utilisateur'] ===$Admin5) {
                    echo'<p class="card-text text-center"><a href="https://api.whatsapp.com/send?phone='.$Whatsapp5.'&text=Bonjour,%20je%20veux%20savoir%20où%20ma%20commande%20est%20arrivée%20jusqu&#39;à%20présent,%20Reference%20'.$varid.'_'.$varuser.'" target="_blank"><svg class=" text-danger" xmlns="http://www.w3.org/2000/svg" width="96" height="96" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16"><path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/></svg></a></p>';
                    
                }
                
                
                ?>

            </div>
        </div>
  </li>



</ul>


    



</div>
    </body>
</html>





















<!-- 

<div class=" container">
<button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Bootstrap</strong>
      <small>11 mins ago</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
  </div>
</div>
</div>
<script src="js/scripts.js"></script> -->