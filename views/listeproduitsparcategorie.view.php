

<main>
    <div class="sidebar">
        <h3>CATEGORIES</h3>
        <div class="checklist categories">
            <ul>
                <?php foreach($datas[1] as $ligne) : ?>
                    <li><a href="<?= URL ?>listeproduits/<?= $ligne['NumCat']?>"><span><?= $ligne['LibCat'] ?></span></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <div class="cardcontainer">

       <?php foreach($datas[0] as $ligne) :?>
            <div class="card">
                <img src="<?= URL ?>produits/<?= $ligne["image"] ?>" alt="photo produit">
                <div class="insidecardcontainer">
                    <p><?= $ligne["NomProd"]; ?></p>
                    <p>Prix : <?= $ligne["PrixProd"]; ?>€</p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>


