<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Matelas lux Gestion des commandes</title>
                <!-- Icon de main:apple windows android -->
        <link rel="icon" href="imgs\icon.png">
        <link rel="shortcut" href="imgs\icon.png">
        <link rel="apple-touche-icon" href="imgs\icon.png">
        <meta name="viewport" content="initial-scale=1">

        <!-- SEO TAG FACEBOOK -->
        <meta property="og:title" content="Gestion Matelaslux">
        <meta property="og:description" content="<?php echo $Adresse; ?>">
        <meta property="og:image" content="imgs\icon.png">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="720">
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://matelaslux.elbossinmobiliaria.com">
        <meta property="fb:app_id" content="xxxxxxxxxxxxxxxxxxxx">

        <!-- BOOTSTRAP Y JS FICHIER CSS -->
        <link rel="stylesheet" href="styles/main.css" />
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body class=" container  mt-3">
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
              <h1>Matelaslux 🔒</h1>
        <form action="includes/process_login.php" method="post" name="login_form"> 			
            Email: <input  class="form-control" type="text" name="email" />
            Mot de passe: <input class="form-control"  type="password" 
                             name="password" 
                             id="password"/>
            <input type="button" class="btn btn-outline-warning  mt-2"
                   value="Login" 
                   onclick="formhash(this.form, this.form.password);" /> 
        </form>
        <p>Si vous n'avez pas de login, veuillez <a href="register.php">register</a></p>
        <p>Si vous avez terminé, veuillez <a href="includes/logout.php">log out</a>.</p>
        <p>Vous êtes actuellement connecté <?php echo $logged ?>.</p>

        
      
    </body>
</html>

