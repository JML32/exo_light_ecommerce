<div class="navbar">
    <a href="<?= URL ?>accueil">Accueil</a>
    <a href="<?= URL ?>listeproduits">Produits</a>
    <a href="<?= URL ?>contact">Contact</a>

    <?php if(isset($_SESSION['connect']) && isset($_SESSION['email']) && isset($_SESSION['pseudo']) && $_SESSION['connect'] === 1) : ?>
        <a href="<?= URL ?>panier">Panier</a>
    <?php endif; ?>



    <div class="fraisport">frais de port gratuit à partir de 50€ d'achat</div>
</div>
