<?php 
$id = $_SESSION["id_client"];

$newpassword = "";
$old_password = ""; 
$confirm_password = "";

    include('connexion_bdd.php');
    $sql = "SELECT * FROM client WHERE mail_client = '" .$_SESSION['login']. "'";
    $resultat = $bdd->query($sql);
    $utilisateur = $resultat-> fetch();


if (isset($_POST['newpassword'])) {
    $newpassword = strip_tags($_POST['newpassword']);
}

if (isset($_POST['old_password'])) {
    $old_password = strip_tags($_POST['old_password']);
}

if (isset($_POST['confirm_password'])) {
    $confirm_password = strip_tags($_POST['confirm_password']);
}


$erreur = "";

//si l'utilisateur a soumis le formulaire sans remplit les champs
if(isset($_POST['nom']) && $newpassword =="" && $old_password =="" && $confirm_password ==""){
    $erreur = "Les champs doivent être remplis";
}else{
    //si l'utilisateur a remplis au moins un des champs
    if ($old_password != "" || $confirm_password != ""|| $newpassword != ""){

        if($newpassword==""){
            $erreur = "le champs 'Nouveau mot de passe' est obligatoire";
        }else if($old_password == ""){
            $erreur = "le champs 'Mot de passe' est obligatoire";
        }else if($confirm_password==""){
            $erreur = "le champs 'Confirmer le mot de passe' est obligatoire";
        }
        //sinon si la taille du mdp est inférieur a 6 caractéres
    }else if(strlen($newpassword) < 6){
        $erreur = "Le mot de passe doit avoir au moins 6 caractéres";
    }else if(strtolower($newpassword) == $password){
        $erreur = "Le mot de passe doit contenir au moins une majuscule";
    }else if(strtoupper($newpassword) == $password){
        $erreur = "Le mot de passe doit contenir au moins une minuscule";
    }else if($newpassword != $confirm_password){
        $erreur = "Les 2 mots de passes ne sont pas identiques";
    }

    if ($erreur == ""){
        if($newpassword == $confirm_password){
            $hashpass = password_hash($newpassword, PASSWORD_BCRYPT);
            if(password_verify(strip_tags($old_password),strip_tags($utilisateur["mdp_client"]))){
                include('connexion_bdd.php');
                $check = $bdd->prepare("UPDATE client SET mdp_client = ? WHERE id_client = ?");
                $check->execute(array($hashpass, $id));
                header('Location:/locationVh/index.php?page=infos');
            }
        }
    }
}

echo $erreur;
?>

<form action="" method="post" class="inscriptionForm">

    <div>
    <label class="inscriptionLabel">Ancien mot de passe :</label>
    <input class="inputForm" type="password" name="old_password" placeholder="Votre ancien mot de passe">
    </div>

    <div class="inscriptionMDP">
        <label class="inscriptionLabel">Nouveau mot de passe :</label>
        <input class="inputForm" type="password" name="newpassword" placeholder="Votre nouveau mot de passe">
    </div>

    <div>
        <label class="inscriptionLabel">Confirmer le nouveau mot de passe :</label>
        <input class="inputForm" type="password" name="confirm_password" placeholder="Confirmez votre nouveau mot de passe">
    </div>

    <input class="inputFormSubmit" type="submit" class="inscriptionSubmit">
</form>
