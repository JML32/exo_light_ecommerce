<main>


    <?php
    if(isset($_SESSION['connect']) && isset($_SESSION['email']) && isset($_SESSION['pseudo']) && $_SESSION['connect'] === 1){
        echo '<h3>'."Bienvenue " . $_SESSION['pseudo'] . " sur le site Techtronik !".'</h3>';
    }

    // ****** sélection 2 produits avec 2ème produit différent du premier (->suppression du 1er produit choisi pour le choix du 2ème dans tableau produits)
    $array1 = [];
    $array2 = [];

    foreach($data as $index => $record){
        if ($index === "datas"){
            $array1[] = $record;
        }
    }

    $result = array_merge($array2, $array1);
    $alea1 = rand(0, count($array1[0]))-1;
    if($alea1 < 0){
        $alea1 = 0;
    }

    unset($result[0][$alea1]);
    //$result = array_slice($result[0], 0);
    $alea2 = rand(0, count($result[0]))-1;

    if (!array_key_exists($alea2, $result[0])) {
        $alea2 -= 1;
    }

    if($alea2 < 0){
        $alea2 = 0;
    }


   if(!empty($_POST)){
       $_SESSION['panier'][] = [
                $_POST['productcode'],
                $_POST['productprice'],
                $_POST['productqty'],
           ] ;
   }
    ?>


   <div class="cardcontainer">
        <div class="card">
            <a href="<?= URL ?>produit/<?= $array1[0][$alea1]["NumProd"]?>"><img src="<?= URL ?>produits/<?= $array1[0][$alea1]["image"] ?>" alt="photo produit"></a>
            <div class="insidecardcontainer">
                <p><?= $array1[0][$alea1]["NomProd"]; ?></p>
                <p><?= $array1[0][$alea1]["PrixProd"]; ?>€</p>
            </div>
            <?php if(isset($_SESSION['connect']) && isset($_SESSION['email']) && $_SESSION['connect'] === 1) : ?>
                <form method="post" action="accueil">
                    <input type="hidden" name="productcode" value="<?= $array1[0][$alea1]["NomProd"] ?>">
                    <input type="hidden" name="productprice" value="<?= $array1[0][$alea1]["PrixProd"] ?>">
                    <input type="number" name="productqty" value="1">
                    <button type="submit" class="button">acheter</button>
                </form>
            <?php endif; ?>
        </div>

        <div class="card">
            <a href="<?= URL ?>produit/<?= $result[0][$alea2]["NumProd"]?>"><img src="<?= URL ?>produits/<?= $result[0][$alea2]["image"] ?>" alt="photo produit"></a>
            <div class="insidecardcontainer">
                <p><?= $result[0][$alea2]["NomProd"]; ?></p>
                <p><?= $result[0][$alea2]["PrixProd"]; ?>€</p>
            </div>
            <?php if(isset($_SESSION['connect']) && isset($_SESSION['email']) && $_SESSION['connect'] === 1) : ?>
                <form method="post" action="accueil">
                    <input type="hidden" name="productcode" value="<?= $result[0][$alea2]["NomProd"] ?>">
                    <input type="hidden" name="productprice" value="<?= $result[0][$alea2]["PrixProd"] ?>">
                    <input type="number" name="productqty" value="1">
                    <button type="submit" class="button">acheter</button>
                </form>
            <?php endif; ?>
        </div>
   </div>


</main>

