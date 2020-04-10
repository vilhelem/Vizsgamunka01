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








if(isset($_GET['remove'])) {

$_SESSION['product_' . $_GET['remove']]--; //lehet rossz lesz

if ($_SESSION['product_' . $_GET['remove']] < 1) {

redirect("checkout.php");

} else {

    redirect("checkout.php");

}


}

if(isset($_GET['delete'])) {

    $_SESSION['product_' . $_GET['delete']] ='0';

    redirect("checkout.php");

}




 function cart() {

  $query = query("SELECT * FROM termekek");
  confirm($query);

  while($row = fetch_array($query)) {


 $termek = <<<DELIMETER
            <tr>
                <td>{$row['termek_nev']}</td>
                <td>$23</td>
                <td>3</td>
                <td>2</td>
                <td><a href="cart.php?remove=1">Remove</a></td>
                <td><a href="cart.php?delete=1">Delete</a></td>
            </tr>

 DELIMETER;

 echo $termek;

  }






 }


?>