<?php foreach($datas as $ligne) :?>
    <div class="card1">
        <img class="img1" src="<?= URL ?>produits/<?= $ligne["image"] ?>" alt="photo produit">
            <div class="insidecardcontainer1">
                <p><?= $ligne["NomProd"]; ?></p>
                <p><?= $ligne["Caracteristiques"]; ?></p>
                <p>Couleur : <?= $ligne["Couleur"]; ?></p>
                <p>Largeur : <?= $ligne["Largeur"]; ?></p>
                <p>Longueur : <?= $ligne["Longueur"]; ?></p>
                <p>Profondeur : <?= $ligne["Profondeur"]; ?></p>
                <p>Poids : <?= $ligne["Poids"]; ?></p>
                <p>Prix : <?= $ligne["PrixProd"]; ?>€</p>
            </div>
    </div>
<?php endforeach; ?>






