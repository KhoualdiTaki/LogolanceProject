<?php session_start(); ob_start();
$client = isset($_SESSION['client']) ? $_SESSION['client'] : header('location: core/client/deconnecter.php');
$idc = $client['id_client'];
$idd = isset($_GET['idd']) ? $_GET['idd'] : header('location: core/client/deconnecter.php');
?>
<!-- Sign In Start -->
    <div class="row h-100 justify-content-center" style="min-height: 100vh;">
        <div class="col-12">
            <div class="bg-light rounded">
                <div class="d-flex align-items-center justify-content-between">
                    <h6>Nouvelle Offre</h6>
                </div>
                <form method="post" action="core/offre/ajouter.php">
                    <input type="hidden" name="clientOffre" value="<?php echo $idc; ?>">
                    <input type="hidden" name="domaineOffre" value="<?php echo $idd; ?>">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="intituleOffre" id="floatingIntitule" placeholder="Intitulé de l'offre">
                        <label for="floatingIntitule">Intitulé de l'offre</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="descriptionOffre" id="floatingDescription" placeholder="Description de l'offre"></textarea>
                        <label for="floatingDescription">Description de l'offre</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="montantOffre" id="floatingMontant" placeholder="Montant de l'offre">
                        <label for="floatingMontant">Montant de l'offre</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="monnaieOffre" id="floatingMonnaie" placeholder="Monnaie de l'offre">
                        <label for="floatingMonnaie">Monnaie de l'offre</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="uniteOffre" id="floatingUnite" placeholder="Unité de l'offre">
                        <label for="floatingUnite">Unité de l'offre</label>
                    </div>
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Ajouter</button>
                </form>
            </div>
        </div>
    </div>

<!-- Sign In End -->