<?php


$absolutelinkbeg = substr($_SERVER['SCRIPT_FILENAME'],0,44);

require_once ($absolutelinkbeg.'/functions/functions.php');
require_once ($absolutelinkbeg.'/models/model.class.php');

class ConnexionManager extends Model {

    public function checkEmailinBDD($email, $password)
    {
        $req = $this->getBdd()->prepare("SELECT * FROM users WHERE email = :email");
        $req->execute(array(
            ':email' => $email
        ));

        $error = 1;

        while ($user = $req->fetch()) {
            if (password_verify($password, $user['password'])) {
                $error = 0;
                $_SESSION['connect'] = 1;
                $_SESSION['pseudo'] = $user['pseudo'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['panier'] = [];


                header('location: index.php?success=1');
                exit();
            }
        }

        if($error === 1) {
            header('location: connexion?error=1');
            exit();
        }
    }
}

$connexionManager = new ConnexionManager();


// CONNEXION
if(!empty($_POST['email']) && !empty($_POST['password'])){

    // VARIABLES
    $pseudo		= checkInput($_POST['pseudo']);
    $email 		= checkInput($_POST['email']);
    $password 	= checkInput($_POST['password']);

    $connexionManager->checkEmailinBDD($email, $password);
}

?>



<?php
if(isset($_GET['error'])){
    echo'<p id="error">Nous ne pouvons pas vous authentifier.</p>';
}
else if(isset($_GET['success'])){
    echo'<p id="success">Vous êtes maintenant connecté.</p>';
}
?>

<div id="form">
    <form method="POST" action="connexion">
        <div>
            <div>
                <label>Email</label>
                <input type="email" name="email" placeholder="Ex : example@gmail.com" required></td>
            </div>
            <div>
                <label>Mot de passe</label>
                <input type="password" name="password" placeholder="Ex : ********" required ></td>
            </div>
        </div>
        <div id="button">
            <button type='submit'>Se connecter</button>
        </div>
    </form>
</div>
