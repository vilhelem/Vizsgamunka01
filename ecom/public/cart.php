<?php require_once("../resources/config.php"); ?>

<?php 


if(isset($_GET['add'])) {


    $query = query("SELECT * FROM termekek WHERE termek_id=" . escape_string($_GET['add']). " ");
    confirm($query);

    while($row = fetch_array($query)) {


      if($row['termek_darabszam'] != $_SESSION['product_' . $_GET['add']]) {

        $_SESSION['product_' . $_GET['add']]+=1;
        redirect("../public/checkout.php");


      } else {


        set_message("We only have  " . $row['termek_darabszam'] . " " . "{$row['termek_nev']}" . " available");
        redirect("../public/checkout.php");



      }






    }


    /*$_SESSION['product_' . $_GET['add']]  +=1;

    redirect("index.php"); */

}






?>