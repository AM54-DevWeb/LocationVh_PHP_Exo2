<?php
$id = $_SESSION["id_client"];

$newnom = "";
$newprenom = "";
$newmailto = "";
$newadresse = "";
$newtel = "";

if (isset($_POST['nom'])) {
    $newnom = strip_tags($_POST['nom']);
}
if (isset($_POST['prenom'])) {
    $newprenom = strip_tags($_POST['prenom']);
}

if (isset($_POST['mailto'])) {
    $newmailto = strip_tags($_POST['mailto']);
}

if (isset($_POST['adresse'])) {
    $newadresse = strip_tags($_POST['adresse']);
}

if (isset($_POST['tel'])) {
    $newtel = strip_tags($_POST['tel']);
}

$erreur = "";

//si l'utilisateur a soumis le formulaire sans remplit les champs
if(isset($_POST['nom']) && $newnom =="" && $newtel == "" && $newmailto == "" && $newadresse = "" && $newprenom = ""){
    $erreur = "Les champs doivent être remplis";
}else{
    //si l'utilisateur a remplis au moins un des champs
    if ($newnom != "" || $newtel != ""|| $newmailto != ""|| $newadresse != ""|| $newprenom != ""){

        if($newnom==""){
            $erreur = "le champs 'Nom' est obligatoire";
        }else if($newtel==""){
            $erreur = "le champs 'Téléphone' est obligatoire";
        }else if($newmailto==""){
            $erreur = "le champs 'confirmer le mot de passe' est obligatoire";
        }else if($newadresse==""){
            $erreur = "le champs 'Adresse le mot de passe' est obligatoire";
        }else if($newprenom==""){
            $erreur = "le champs 'Prenom le mot de passe' est obligatoire";
        }
        //sinon si la taille du mdp est inférieur a 6 caractéres
    }

    if ($erreur == "" && isset($_POST['nom'])){
            include('connexion_bdd.php');
            $check = $bdd->prepare("UPDATE client SET prenom_client = ?, mail_client = ?, nom_client = ?, adresse_client = ?, num_tel_client = ? WHERE id_client = ?");
            $check->execute(array($newprenom, $newmailto, $newnom, $newadresse, $newtel, $id));
            header('Location:/locationVh/index.php?page=infos');
    }
}
?>

<?php

    include('connexion_bdd.php');
    $sql = "SELECT * FROM client WHERE mail_client = '" .$_SESSION['login']. "'";
    $resultat = $bdd->query($sql);
    $utilisateur = $resultat-> fetch();

?>

<form action="" method="post" class="inscriptionForm">
    <div class="inscriptionNom">
        <label class="inscriptionLabel">Nom :</label>
        <input class="inputForm" type="text" name="nom" placeholder="Votre nom" value="<?php echo $utilisateur["nom_client"] ?>">
    </div>

    <div>
        <label class="inscriptionLabel">Prénom :</label>
        <input class="inputForm" type="text" name="prenom" placeholder="Votre prénom" value="<?php echo $utilisateur["prenom_client"] ?>">
    </div>

    <div>
        <label class="inscriptionLabel">E-Mail :</label>
        <input class="inputForm" type="email" name="mailto" placeholder="mail@votremail.fr" value="<?php echo $utilisateur["mail_client"] ?>">
    </div>

    <div>
        <label class="inscriptionLabel">Adresse :</label>
        <input class="inputForm" type="text" name="adresse" placeholder="Adresse" value="<?php echo $utilisateur["adresse_client"] ?>">
    </div>
    
    <div>
        <label class="inscriptionLabel">N° de téléphone :</label>
        <input class="inputForm" type="tel" name="tel" placeholder="Votre numéro de téléphone" value="<?php echo $utilisateur["num_tel_client"] ?>">
    </div>

    <input class="inputFormSubmit" type="submit" class="inscriptionSubmit">
</form>