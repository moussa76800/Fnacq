<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <?php Securite::estAdministrateur()  ?>
          <title>DASHBOARD ADMINISTRATEUR</title>
          <a class="nav-link" aria-current="page" href="<?= URL ?>accueil">Accueil</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Gestion des Articles
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= URL ?>administration/livres">Gestion des articles Livres</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>materielsInformatiques">Gestion des articles Informatiques</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>materielsHifi">Gestion des articles Hifi</a></li>


          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Services
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

            <li><a class="dropdown-item" aria-current="page" href="<?= URL ?>compte/profil">Profil</a></li>
            <li><a class="dropdown-item" aria-current="page" href="<?= URL ?>compte/deconnection">Déconnection</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Divers
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= URL ?>tchat">Mini-tchat</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>administration/blog">Gestion du Blog</a></a></li>
          </ul>
        </li>
        
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Administration
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?= URL ?>administration/droits">Gestion</a></li>
              <li><a class="dropdown-item" href="<?= URL ?>administration/droits">Nombre de connexions d'un UM</a></li>
              <li><a class="dropdown-item" href="<?= URL ?>administration/droits">Liste des achats effectués par un UM</a></li>
              

            </ul>
          </li>
        
    </div>
  </div>
</nav>