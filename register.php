<?php

include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Registration Form</title>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" href="styles/main.css" />
        <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    </head>
    <body class="container mt-3">
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <h1>Nouveaux compte</h1>

        
        <?php 
        $condition = htmlentities($_SESSION['username']);
        echo $condition;
        if ($condition ===  $Admin3) {  

?>
        
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        <form method="post" name="registration_form" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>">
            Username: <input class="form-control" type='text' name='username' id='username' /><br>
            Email: <input class="form-control" type="text" name="email" id="email" /><br>
            Password: <input class="form-control" type="password"
                             name="password" 
                             id="password"/><br>
            Confirm password: <input class="form-control" type="password" 
                                     name="confirmpwd" 
                                     id="confirmpwd" /><br>
            <input type="button" class="btn btn-outline-warning"
                   value="Register" 
                   onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);" /> 
        </form>
        <p>Return to the <a href="index.php">login page</a>.</p>
        <ul>
            <li>Usernames may contain only digits, upper and lower case letters and underscores</li>
            <li>Emails must have a valid email format</li>
            <li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul>
                    <li>At least one upper case letter (A..Z)</li>
                    <li>At least one lower case letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            </li>
            <li>Your password and confirmation must match exactly</li>
        </ul>

       
        <?php }else {
            echo'<div class="container alert-danger">Vous navez pas la permission dentrer, Contacter siphax  <a class="" href="index.php"> Login</a></div>';
        } ?>   
    </body>
</html>
