<?php



include_once 'psl-config.php';



function sec_session_start() {
    $session_name = 'sec_session_id';   // Set a custom session name 
    $secure = SECURE;

    // This stops JavaScript being able to access the session id.
    $httponly = true;

    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }

    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);

    // Sets the session name to the one set above.
    session_name($session_name);

    session_start();            // Start the PHP session 
    session_regenerate_id();    // regenerated the session, delete the old one. 
}

function login($email, $password, $mysqli) {
    // Using prepared statements means that SQL injection is not possible. 
    if ($stmt = $mysqli->prepare("SELECT id, username, password, salt 
				  FROM members 
                                  WHERE email = ? LIMIT 1")) {
        $stmt->bind_param('s', $email);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();

        // get variables from result.
        $stmt->bind_result($user_id, $username, $db_password, $salt);
        $stmt->fetch();

        // hash the password with the unique salt.
        $password = hash('sha512', $password . $salt);
        if ($stmt->num_rows == 1) {
            // If the user exists we check if the account is locked
            // from too many login attempts 
            if (checkbrute($user_id, $mysqli) == true) {
                // Account is locked 
                // Send an email to user saying their account is locked 
                return false;
            } else {
                // Check if the password in the database matches 
                // the password the user submitted.
                if ($db_password == $password) {
                    // Password is correct!
                    // Get the user-agent string of the user.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];

                    // XSS protection as we might print this value
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;

                    // XSS protection as we might print this value
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);

                    $_SESSION['username'] = $username;
                    $_SESSION['login_string'] = hash('sha512', $password . $user_browser);

                    // Login successful. 
                    return true;
                } else {
                    // Password is not correct 
                    // We record this attempt in the database 
                    $now = time();
                    if (!$mysqli->query("INSERT INTO login_attempts(user_id, time) 
                                    VALUES ('$user_id', '$now')")) {
                        header("Location: ../error.php?err=Database error: login_attempts");
                        exit();
                    }

                    return false;
                }
            }
        } else {
            // No user exists. 
            return false;
        }
    } else {
        // Could not create a prepared statement
        header("Location: ../error.php?err=Database error: cannot prepare statement");
        exit();
    }
}

function checkbrute($user_id, $mysqli) {
    // Get timestamp of current time 
    $now = time();

    // All login attempts are counted from the past 2 hours. 
    $valid_attempts = $now - (2 * 60 * 60);

    if ($stmt = $mysqli->prepare("SELECT time 
                                  FROM login_attempts 
                                  WHERE user_id = ? AND time > '$valid_attempts'")) {
        $stmt->bind_param('i', $user_id);

        // Execute the prepared query. 
        $stmt->execute();
        $stmt->store_result();

        // If there have been more than 5 failed logins 
        if ($stmt->num_rows > 5) {
            return true;
        } else {
            return false;
        }
    } else {
        // Could not create a prepared statement
        header("Location: ../error.php?err=Database error: cannot prepare statement");
        exit();
    }
}

function login_check($mysqli) {
    // Check if all session variables are set 
    if (isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {
        $user_id = $_SESSION['user_id'];
        $login_string = $_SESSION['login_string'];
        $username = $_SESSION['username'];

        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];

        if ($stmt = $mysqli->prepare("SELECT password 
				      FROM members 
				      WHERE id = ? LIMIT 1")) {
            // Bind "$user_id" to parameter. 
            $stmt->bind_param('i', $user_id);
            $stmt->execute();   // Execute the prepared query.
            $stmt->store_result();

            if ($stmt->num_rows == 1) {
                // If the user exists get variables from result.
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check = hash('sha512', $password . $user_browser);

                if ($login_check == $login_string) {
                    // Logged In!!!! 
                    return true;
                } else {
                    // Not logged in 
                    return false;
                }
            } else {
                // Not logged in 
                return false;
            }
        } else {
            // Could not prepare statement
            header("Location: ../error.php?err=Database error: cannot prepare statement");
            exit();
        }
    } else {
        // Not logged in 
        return false;
    }
}

function esc_url($url) {

    if ('' == $url) {
        return $url;
    }

    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
    
    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;
    
    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }
    
    $url = str_replace(';//', '://', $url);

    $url = htmlentities($url);
    
    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);

    if ($url[0] !== '/') {
        // We're only interested in relative links from $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
}


function admin1() {
    echo'
    <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">

        

            <li><a href="protected_page.php" class="nav-link px-2 link-dark">Commandes</a></li>
            <li><a href="ajouter_commandes.php" class="nav-link px-2 link-dark">Ajouter</a></li>   
            <li><a href="recherche.php" class="nav-link px-2 link-dark">Recherche</a></li>
            <li><a href="prix.php" class="nav-link px-2 link-dark">Prix</a></li>
            <li><a href="profile.php" class="nav-link px-2 link-dark">profile</a></li>

        </ul>

        <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" method="POST">
          <img src="imgs/logo.png" alt="logo">
        </form> -->

        <div class="dropdown text-end">
          <a href="protected_page.php" class="d-block link-dark text-decoration-none ">
            <img src="imgs/profile.png" alt="mdo" width="32" height="32" class="rounded-circle">
            <span class="link-dark">Bonjour&nbsp;'; echo htmlentities($_SESSION['username']);
            echo '&nbsp;</span>
          </a>

        </div>
        &nbsp;&nbsp;<a type="button" href="includes/logout.php" class=" btn-outline-danger" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16"><path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/></svg></a>
  
      </div>
    </div>
  </header>
    ';
}

function admin2() {
    echo'
    <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">

        

            <li><a href="protected_page.php" class="nav-link px-2 link-dark">Commandes</a></li>
            <li><a href="ajouter_commandes.php" class="nav-link px-2 link-dark">Ajouter</a></li>   
            <li><a href="recherche.php" class="nav-link px-2 link-dark">Recherche</a></li>
             <li><a href="prix.php" class="nav-link px-2 link-dark">Prix</a></li>
             <li><a href="profile.php" class="nav-link px-2 link-dark">profile</a></li>
        </ul>

        <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" method="POST">
          <img src="imgs/logo.png" alt="logo">
        </form> -->

        <div class="dropdown text-end">
          <a href="protected_page.php" class="d-block link-dark text-decoration-none ">
            <img src="imgs/profile.png" alt="mdo" width="32" height="32" class="rounded-circle">
            <span class="link-dark">Bonjour&nbsp;'; 
            echo htmlentities($_SESSION['username']);
            echo '&nbsp;</span>
          </a>

        </div>
        &nbsp;&nbsp;<a type="button" href="includes/logout.php" class=" btn-outline-danger" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16"><path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/></svg></a>
  
      </div>
    </div>
  </header>
    ';
}
function admin3() {
  $hostname = 'db5007270364.hosting-data.io';
  $database = 'dbs5992035';
  $username = 'dbu482015';
  $password = 'NFsUi2da@p#J6yL';
  $database = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8",$username,$password);
  $statue =  openssl_encrypt('Conferme','AES-256-CBC','siphax',0,'1234567812345678');
  $listexpedition = $database->prepare("SELECT * FROM commandes WHERE statue = :statue ");
  $listexpedition -> bindParam("statue",$statue);
  if($listexpedition->execute()){
  $count = $listexpedition->rowCount();

    echo'
    <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">

            <li><a href="protected_page.php" class="nav-link px-2 link-dark">Commandes</a></li>
            <li><a href="ajouter_commandes.php" class="nav-link px-2 link-dark">Ajouter</a></li>
            <a href="confirmation_expedition.php" type="button" class="btn btn-warning position-relative ms-2">
            Confermation
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              ';

                  echo $count.'
              <span class="visually-hidden">Unread Commandes</span>
            </span>
          </a>';
        }
          echo'
            <li><a href="Expedition.php" class="nav-link px-2 link-dark">Expedition</a></li>
            <li><a href="recherche.php" class="nav-link px-2 link-dark">Recherche</a></li>
            <li><a href="profile.php" class="nav-link px-2 link-dark">profile</a></li>
            <!-- <li><a href="prix.php" class="nav-link px-2 link-dark">Prix</a></li>

        </ul>

        <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" method="POST">
          <img src="imgs/logo.png" alt="logo">
        </form> -->

        <div class="dropdown text-end">
          <a href="protected_page.php" class="d-block link-dark text-decoration-none ">
            <img src="imgs/profile.png" alt="mdo" width="32" height="32" class="rounded-circle">
            <span class="link-dark">Bonjour&nbsp;'; 
            echo htmlentities($_SESSION['username']);
            echo '&nbsp;</span>
          </a>

        </div>
        &nbsp;&nbsp;<a type="button" href="includes/logout.php" class=" btn-outline-danger" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16"><path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/></svg></a>
  
      </div>
    </div>
  </header>
    ';
}

function admin4() {
  
echo'
<header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">

            <li><a href="protected_page.php" class="nav-link px-2 link-dark">Commandes</a></li>
            <li><a href="ajouter_commandes.php" class="nav-link px-2 link-dark">Ajouter</a></li>
            <li><a href="Expedition.php" class="nav-link px-2 link-dark">Expedition</a></li>
            <li><a href="profile.php" class="nav-link px-2 link-dark">profile</a></li>
            
        </ul>

        <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" method="POST">
          <img src="imgs/logo.png" alt="logo">
        </form> -->

        <div class="dropdown text-end">
          <a href="protected_page.php" class="d-block link-dark text-decoration-none ">
            <img src="imgs/profile.png" alt="mdo" width="32" height="32" class="rounded-circle">
            <span class="link-dark">Bonjour&nbsp;'; 
            echo htmlentities($_SESSION['username']);
            echo '&nbsp;</span>
          </a>

        </div>
        &nbsp;&nbsp;<a type="button" href="includes/logout.php" class=" btn-outline-danger" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16"><path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/></svg></a>
  
      </div>
    </div>
  </header>
';
}



            

function admin5() {
  $hostname = 'db5007270364.hosting-data.io';
  $database = 'dbs5992035';
  $username = 'dbu482015';
  $password = 'NFsUi2da@p#J6yL';
  $database = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8",$username,$password);
  $statue =  openssl_encrypt('Conferme','AES-256-CBC','siphax',0,'1234567812345678');
  $listexpedition = $database->prepare("SELECT * FROM commandes WHERE statue = :statue ");
  $listexpedition -> bindParam("statue",$statue);
  if($listexpedition->execute()){
  $count = $listexpedition->rowCount();

    echo'
    <header class="p-3 mb-3 border-bottom">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
              <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
    
                <li><a href="protected_page.php" class="nav-link px-2 link-dark btn btn-outline-warning">Commandes</a></li>
                <li><a href="ajouter_commandes.php" class="nav-link px-2 link-dark btn btn-outline-warning ms-2">Ajouter</a></li>
                
                <a href="confirmation_expedition.php" type="button" class="btn btn-warning position-relative ms-2">
                  Confermation
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    ';

                        echo $count.'
                    <span class="visually-hidden">Unread Commandes</span>
                  </span>
                </a>';
              }
                echo'
                <li><a href="profile.php" class="nav-link px-2 link-dark btn btn-outline-warning ms-2">profile</a></li>
                
            </ul>
    
            <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" method="POST">
              <img src="imgs/logo.png" alt="logo">
            </form> -->
    
            <div class="dropdown text-end">
              <a href="protected_page.php" class="d-block link-dark text-decoration-none ">
                <img src="imgs/profile.png" alt="mdo" width="32" height="32" class="rounded-circle">
                <span class="link-dark">Bonjour&nbsp;'; 
                echo htmlentities($_SESSION['username']);
                echo '&nbsp;</span>
              </a>
    
            </div>
            &nbsp;&nbsp;<a type="button" href="includes/logout.php" class=" btn-outline-danger" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16"><path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/></svg></a>
      
          </div>
        </div>
      </header>
    ';
    }

    ?>