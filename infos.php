<?php

    include('connexion_bdd.php');
    $sql = "SELECT * FROM client WHERE mail_client = '" .$_SESSION['login']. "'";
    $resultat = $bdd->query($sql);
    $utilisateur = $resultat-> fetch();

?>

<div class="infos">
    <label>Nom :</label>
    <p>
        <?php
            echo $utilisateur['nom_client'];
        ?>
    </p>
    <label>Prénom :</label>
    <p>
        <?php
                echo $utilisateur['prenom_client'];
        ?>
    </p>
    <label>Adresse mail :</label>
    <p>
        <?php
                echo $utilisateur['mail_client'];
        ?>
    </p>
    <label>Adresse :</label>
    <p>
        <?php
                echo $utilisateur['adresse_client'];
        ?>
    </p>
    <label>Numéro de téléphone :</label>
    <p>
        <?php
                echo $utilisateur['num_tel_client'];
        ?>
    </p>

    <a href="/locationVh/index.php?page=modifCompte" class="modifierInfos">Modifier</a>
    <a href="/locationVh/index.php?page=modifMDP" class="modifierInfos">Modifier le mot de passe</a>
    

</div>