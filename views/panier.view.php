<?php

if(!isset($_SESSION["panier"]) || sizeof($_SESSION["panier"]) === 0 ){
    echo '<h2>Votre panier est vide !</h2>';
}
$montantpanier = 0;
?>


<div class="pagecontainer">



    <table>
        <tr>
            <th>Produit</th>
            <th>Prix</th>
            <th>Quantité</th>
        </tr>
        <?php for ($i=0; $i < count($_SESSION['panier']); $i++) { ?>
        <tr>
            <td><?= $_SESSION['panier'][$i][0] ?></td>
            <td><?= $_SESSION['panier'][$i][1] ?> €</td>
            <td><?= $_SESSION['panier'][$i][2] ?></td>
        </tr>
            <?php $montantpanier += $_SESSION['panier'][$i][1] * $_SESSION['panier'][$i][2]?>
        <?php }; ?>
        <td class="totalpanier"></td><td class="totalpanier">Montant total du panier : </td><td class="totalpanier"><?= number_format($montantpanier, 2, ',', ' '); ?> €</td>

    </table>

</div>

