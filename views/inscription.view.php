<?php

$absolutelinkbeg = substr($_SERVER['SCRIPT_FILENAME'],0,44);

require_once ($absolutelinkbeg.'/functions/functions.php');
require_once ($absolutelinkbeg.'/models/model.class.php');



class ConnexionManager extends Model
{

    public function checkEmail($email)
    {
        $req = $this->getBdd()->prepare("SELECT count(*) as numberEmail FROM users WHERE email = :email");
        $req->execute(array(
            ':email' => $email
        ));

        while ($email_verification = $req->fetch()) {
            if ($email_verification['numberEmail'] != 0) {
                header('location: inscription');
                exit();
            }

        }
    }

    public function recordUser($pseudo,$email, $password){
        // ENVOI DE LA REQUETE
        $req = $this->getBdd()->prepare("INSERT INTO users(pseudo, email, password) VALUES(?,?,?)");
        $req->execute(array(
                $pseudo,
                $email,
                $password
        ));
        header('location: index.php');
        exit();
    }
}


    $connexionManager = new ConnexionManager();

    if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_confirm'])){

    $pseudo       = checkInput($_POST['pseudo']);
    $email        = checkInput($_POST['email']);
    $password     = checkInput($_POST['password']);
    $pass_confirm = checkInput($_POST['password_confirm']);

    if($password != $pass_confirm){
        header('Location: inscription');
        exit();
    }

    // TEST SI EMAIL UTILISE
    $connexionManager->checkEmail($email);


    // CRYPTAGE DU PASSWORD
    $password = password_hash($password, PASSWORD_DEFAULT);

    // ENVOI DE LA REQUETE
        $connexionManager->recordUser($email, $password);

}



?>



<div id="form">
    <form method="POST" action="inscription">

        <div>
            <div>
                <label>Pseudo</label>
                <input type="email" name="pseudo" placeholder="Ex : user nickname" required>
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" placeholder="Ex : example@gmail.com" required>
            </div>

            <div>
                <label>Mot de passe</label>
                <input type="password" name="password" placeholder="Ex : ********" required >
            </div>

            <div>
                <label>Retaper mot de passe</label>
                <input type="password" name="password_confirm" placeholder="Ex : ********" required>
            </div>
        </div>



        <div id="button">
            <button type='submit'>S'inscrire</button>
        </div>
    </form>
</div>