<?php
include("connexion_bdd.php");
$id = $_SESSION["id_client"];

$sql="SELECT * FROM loue WHERE id_client = $id";

foreach ($bdd->query($sql) as $vehicule) {

?>

    <div class="card bg-light mb-3">
        <div class="card-header"><?php echo $vehicule["immat_vehicule"]; ?></div>
        <div class="card-body">
            <h5 class="card-title"> Prix de la location : <?php echo $vehicule["montant_total"].""."€"; ?></h5>
            <h5>Date du début de la location :</h5><?php echo $vehicule["date_deb_location"]; ?>
            <h5>Date de la fin de la location :</h5><?php echo $vehicule["date_fin_location"]; ?>
        </div>
    </div>

<?php
}
?>