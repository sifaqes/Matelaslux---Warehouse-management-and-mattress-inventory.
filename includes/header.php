
<header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">

        

            <li><a href="protected_page.php" class="nav-link px-2 link-dark">Commandes</a></li>
            <li><a href="ajouter_commandes.php" class="nav-link px-2 link-dark">Ajouter</a></li>
            <li><a href="confirmation_expedition.php" class="nav-link px-2 link-dark">Confirmation</a></li>
            <li><a href="Expedition.php" class="nav-link px-2 link-dark">Expedition</a></li>
            
            <li><a href="recherche.php" class="nav-link px-2 link-dark">Recherche</a></li>
            <!-- <li><a href="prix.php" class="nav-link px-2 link-dark">Prix</a></li>
            <li><a href="#" class="nav-link px-2 link-dark disabled" ><sub>Inventaire</sub></a></li> -->
        </ul>

        <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" method="POST">
          <img src="imgs/logo.png" alt="logo">
        </form> -->

        <div class="dropdown text-end">
          <a href="protected_page.php" class="d-block link-dark text-decoration-none ">
            <img src="imgs/profile.png" alt="mdo" width="32" height="32" class="rounded-circle">
            <span class="link-dark">Bonjour&nbsp;<?php echo htmlentities($_SESSION['username']); ?>&nbsp;</span>
          </a>

        </div>
        &nbsp;&nbsp;<a type="button" href="includes/logout.php" class=" btn-outline-danger" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16"><path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/></svg></a>
  
      </div>
    </div>
  </header>

