<div class="container">
  <header>
      <div class="connexion">
          <?php if(isset($_SESSION['connect']) && isset($_SESSION['email']) && isset($_SESSION['pseudo']) && $_SESSION['connect'] === 1) { ?>
                <a href="<?= URL ?>deconnexion">Déconnexion</a>
              <?php } else { ?>
                <a href="<?= URL ?>inscription">S'inscrire</a>
                <a href="<?= URL ?>connexion">Se connecter</a>
          <?php } ?>
      </div>
      <div class="societe">TECHTRONIK</div>

    <?php require_once("views/common/menu.php"); ?>
  </header>
</div>
