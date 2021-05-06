
<?php
$absolutelinkbeg = substr($_SERVER['SCRIPT_FILENAME'],0,44);
require_once ($absolutelinkbeg.'/functions/functions.php');


if(!empty($_POST)){
    $_SESSION['panier'][] = [
        $_POST['productcode'],
        $_POST['productprice'],
        $_POST['productqty'],
    ] ;
}
?>

    <div class="categories">
        <?php foreach($datas[1] as $ligne) : ?>
            <a class="a1" href="<?= URL ?>listeproduits/<?= $ligne['NumCat']?>"><span><?= $ligne['LibCat'] ?></span></a>
        <?php endforeach; ?>
    </div>

    <div class="cardcontainer1">
       <?php foreach($datas[0] as $ligne) :?>
            <div class="card1">
                <a class="a1" href="<?= URL ?>produit/<?= $ligne["NumProd"] ?>"><img class="img1" src="<?= URL ?>produits/<?= $ligne["image"] ?>" alt="photo produit"></a>
                <div class="insidecardcontainer1">
                    <p><?= $ligne["NomProd"]; ?></p>
                    <p>Prix : <?= $ligne["PrixProd"]; ?>€</p>
                </div>
                <?php if(isset($_SESSION['connect']) && isset($_SESSION['email']) && $_SESSION['connect'] === 1) : ?>
                    <form method="post" action="listeproduits">
                        <input type="hidden" name="productcode" value="<?= $ligne["NomProd"] ?>">
                        <input type="hidden" name="productprice" value="<?= $ligne["PrixProd"] ?>">
                        <input type="number" name="productqty" value="1">
                        <button type="submit" class="button">acheter</button>
                    </form>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>





