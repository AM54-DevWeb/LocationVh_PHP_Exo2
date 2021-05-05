<?php
$nom = "";
$prenom = "";
$mailto = "";
$adresse = "";
$tel = "";
$password = "";
$confirm_password = "";

if (isset($_POST['nom'])) {
    $nom = strip_tags($_POST['nom']);
}
if (isset($_POST['prenom'])) {
    $prenom = strip_tags($_POST['prenom']);
}

if (isset($_POST['mailto'])) {
    $mailto = strip_tags($_POST['mailto']);
}

if (isset($_POST['adresse'])) {
    $adresse = strip_tags($_POST['adresse']);
}

if (isset($_POST['tel'])) {
    $tel = strip_tags($_POST['tel']);
}

if (isset($_POST['password'])) {
    $password = strip_tags($_POST['password']);
}

if (isset($_POST['confirm_password'])) {
    $confirm_password = strip_tags($_POST['confirm_password']);
}

$erreur = "";

//si l'utilisateur a soumis le formulaire sans remplit les champs
if(isset($_POST['nom']) && $nom =="" && $tel == "" && $mailto == "" && $adresse = "" && $prenom = "" && $password =="" && $confirm_password ==""){
    $erreur = "Les champs doivent être remplis";
}else{
    //si l'utilisateur a remplis au moins un des champs
    if ($nom != "" || $tel != ""|| $mailto != ""|| $adresse != ""|| $prenom != ""){

        if($nom==""){
            $erreur = "le champs 'Nom' est obligatoire";
        }else if($tel==""){
            $erreur = "le champs 'Téléphone' est obligatoire";
        }else if($confirm_password==""){
            $erreur = "le champs 'confirmer le mot de passe' est obligatoire";
        }else if($adresse==""){
            $erreur = "le champs 'Adresse' est obligatoire";
        }else if($prenom==""){
            $erreur = "le champs 'Prenom' est obligatoire";
        }else if($password==""){
            $erreur = "le champs 'mot de passe' est obligatoire";
        
        //sinon si la taille du mdp est inférieur a 6 caractéres
        }

        if ($erreur == ""){
            if($password == $confirm_password){
                $hashpass = password_hash($password, PASSWORD_BCRYPT);
                include('connexion_bdd.php');
                $check = $bdd->prepare(" INSERT INTO `client` (`nom_client`, `mdp_client`,`mail_client`, `num_tel_client`, `prenom_client`,`adresse_client`)
                VALUES(?,?,?,?,?,?)");
                $check->execute(array($nom,$hashpass,$mailto,$tel,$prenom,$adresse));
                header('Location:/locationVh/index.php?page=connexion');
            }
        }
    }
}
?>

<form action="" method="post" class="inscriptionForm">
    <div class="inscriptionNom">
        <label class="inscriptionLabel">Nom :</label>
        <input class="inputForm" type="text" name="nom" placeholder="Votre nom">
    </div>

    <div>
        <label class="inscriptionLabel">Prénom :</label>
        <input class="inputForm" type="text" name="prenom" placeholder="Votre prénom">
    </div>

    <div class="inscriptionMDP">
        <label class="inscriptionLabel">Mot de passe :</label>
        <input class="inputForm" type="password" name="password" placeholder="Votre nouveau mot de passe">
    </div>

    <div>
        <label class="inscriptionLabel">Confirmer le mot de passe :</label>
        <input class="inputForm" type="password" name="confirm_password" placeholder="Confirmez votre nouveau mot de passe">
    </div>

    <div>
        <label class="inscriptionLabel">E-Mail :</label>
        <input class="inputForm" type="email" name="mailto" placeholder="mail@votremail.fr">
    </div>

    <div>
        <label class="inscriptionLabel">Adresse :</label>
        <input class="inputForm" type="text" name="adresse" placeholder="Adresse">
    </div>
    
    <div>
        <label class="inscriptionLabel">N° de téléphone :</label>
        <input class="inputForm" type="tel" name="tel" placeholder="Votre numéro de téléphone">
    </div>

    <input class="inputFormSubmit" type="submit" class="inscriptionSubmit">
</form>