<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?= URL ?>accueil">Accueil</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Articles
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= URL ?>livres">Livres</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>materielsInformatiques">Matériels Informatiques</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>materielsHifi">Matériels Hifi</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>panier">Panier</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Services
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
           
            <?php if (!Securite::estConnecte()) : ?>
              <li><a class="dropdown-item" aria-current="page" href="<?= URL ?>inscription">Inscription</a></li>
              <li><a class="dropdown-item" aria-current="page" href="<?= URL ?>login">Connexion</a></li>
            <?php else : ?>
              <li><a class="dropdown-item" aria-current="page" href="<?= URL ?>compte/profil">Profil</a></li>
              <li><a class="dropdown-item" aria-current="page" href="<?= URL ?>compte/deconnection">Déconnection</a></li>
            <?php endif; ?>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Divers
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= URL ?>tchat">Mini-tchat</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>blog">Blog</a></a></li>
          </ul>
        </li>
        <?php if (Securite::estConnecte() && Securite::estAdministrateur()): ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Administration 
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= URL ?>administration/droits">Gestion des droits</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>administration/droits">Participer au mini-chat</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>administration/droits">Editer des nouveaux commentaires</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>administration/droits">Consulter le nombre de connexions d'un UM</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>administration/droits">Consulter la liste des achats effectués par un UM</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>administration/showBlogUser">Consulter les 5 derniers commentaires d'un UM</a></li>
           
          </ul>
        </li>
        <?php endif; ?>
    </div>
  </div>
</nav>