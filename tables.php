<?php
require('config.php');
require_once DOL_DOCUMENT_ROOT . '/core/lib/functions.lib.php';
require_once DOL_DOCUMENT_ROOT . '/core/lib/functions2.lib.php';

dol_include_once('/product/class/product.class.php');
dol_include_once('/commande/class/commande.class.php');

dol_include_once('/servicerestaurant/class/servicerestaurant.class.php');

$langs->load('servicerestaurant@servicerestaurant'); // Charge les clés de traductions du module
$controllerServiceRestaurant = new ControllerServiceRestaurant($db, $conf, $user);

$lesTables = $controllerServiceRestaurant->showTables();
$button_dolibarr = $controllerServiceRestaurant->buttonLeaveModule();

include_once('include/menu.php');
?>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img alt="logo" src="img/logo.png">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse row" id="navbar">
            <a class="navbar-brand col-lg-4 col-md-4 col-sm-4 col-xs-12" href="#"><?php echo $controllerServiceRestaurant->getRestaurant()->description; ?></a>
            <a class="navbar-brand text-center col-lg-4 col-md-4 col-sm-4 col-xs-12" href="#">Choisissez une table</a>
<?php echo $button_dolibarr; ?>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!-- MODAL A : Prendre une nouvelle commande -->
<div class="modal fade position-modal" id="myModalNew" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <a href="#"><button type="button" class="btn btn-default bouton col-lg-12 col-md-12 col-sm-12 col-xs-12" >Nouvelle</button></a>
    </div>
</div> <!-- /. Fin Modal -->

<!-- MODAL B : Une commande a déjà eu lieu et on peut la modifier ou la valider
Nécessite : - Une redirection vers la commande séléctionnée-->
<div class="modal fade position-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <!-- Récupérer le numéro de la commande -->
        <a href="#" id="table_modif"><button type="button" class="btn btn-default bouton col-lg-12 col-md-12 col-sm-12 col-xs-12">Modifier</button></a>
        <a href="#" data-target="#myModalVerif" data-toggle="modal" data-dismiss="modal"><button type="button" class="btn btn-default bouton col-lg-12 col-md-12 col-sm-12 col-xs-12">Terminer</button></a>
    </div>
</div> <!-- /. Fin Modal -->

<!-- Modal de vérificatino -->
<div class="modal fade position-modal" id="myModalVerif" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
        <h2 class="text-center" style="color: white;">Cette action va réinitialiser la table. Êtes-vous sur de vouloir continuer ?</h2>
        <!-- onClick : vider la table -->
        <a href="#">
            <button type="button" class="btn btn-default bouton col-lg-12 col-md-12 col-sm-12 col-xs-12">OUI</button></a>
        <button type="button" class="btn btn-default bouton col-lg-12 col-md-12 col-sm-12 col-xs-12" data-dismiss="modal">NON</button>
    </div>
</div> <!-- /. Fin Modal -->


<!-- Légende couleurs -->
<div class="col-lg-10 col-lg-offset-1 legend" style=" margin-top: 100px;">
    <div class="col-lg-6 text-center occupe">
        <p>Occupé</p>
    </div>
    <div class="col-lg-6 text-center libre">
        <p>Libre</p>
    </div>
</div>

<!-- Liste de tables -->
<div class="flux col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 ">
    <div class="row">
<?php echo $lesTables; ?>
    </div>
</div>

<script src="less/dist/less.js" type="text/javascript"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="js/etatTable.js"></script>

</body>
</html>
