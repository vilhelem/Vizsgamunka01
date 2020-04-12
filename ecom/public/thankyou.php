<?php require_once("../resources/config.php"); ?>
<?php require_once("cart.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php") ?>


<?php 

if(isset($_GET['tx'])){

    $amount =  $_GET['amt'];
    $currency= $_GET['cc'];
    $transaction =  $_GET['tx'];
    $status = $_GET['st'];


    $query = query("INSERT INTO rendelesek (rendeles_amount, rendeles_transaction, rendeles_currency, rendeles_status ) VALUES('{$amount}', '{$transaction}','{$currency}','{$status}')");

    confirm($query);

    session_destroy(); 

} else {
    redirect("index.php");
}



?>



    <!-- Page Content -->
    <div class="container">

<h1 class="text-center"> Thank you</h2>


    </div>
    <!-- /.container -->

    <?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
