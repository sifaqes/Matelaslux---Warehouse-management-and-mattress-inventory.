<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php
$error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);

if (! $error) {
    $error = 'Oops! An unknown error happened.';
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Matealslux - <?php echo $error; ?></title>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body class="container mt-3">      
    <?php
        echo'
        <div class="alert alert-danger" role="alert">
        <h1>Il y avait un problème</h1> '.$error.'!</div>';
        
        ?> 
    </body>
</html>
