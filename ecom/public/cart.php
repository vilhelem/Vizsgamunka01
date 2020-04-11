<?php require_once("../resources/config.php"); ?>

<?php 


if(isset($_GET['add'])) {


    $query = query("SELECT * FROM termekek WHERE termek_id=" . escape_string($_GET['add']). " ");
    confirm($query);

    while($row = fetch_array($query)) {


      if($row['termek_darabszam'] != $_SESSION['termek_' . $_GET['add']]) {

        $_SESSION['termek_' . $_GET['add']]+=1;
        redirect("checkout.php");


      } else {


        set_message("Csak  " . $row['termek_darabszam'] . " " . "{$row['termek_nev']}" . " van raktáron");
        redirect("checkout.php");



      }



    }


    /*$_SESSION['product_' . $_GET['add']]  +=1;

    redirect("index.php"); */

}








if(isset($_GET['remove'])) {

$_SESSION['termek_' . $_GET['remove']]--; //lehet rossz lesz

if ($_SESSION['termek_' . $_GET['remove']] < 1) {

redirect("checkout.php");

} else {

  redirect("checkout.php");

}


}

if(isset($_GET['delete'])) {

    $_SESSION['termek_' . $_GET['delete']] ='0';

    redirect("checkout.php");

}




 function cart() {

foreach ($_SESSION as $name => $value) {



  if (substr($name, 0, 6)) == "termek_" {

    $query = query("SELECT * FROM termekek");
    confirm($query);
  
    while($row = fetch_array($query)) {
  
  
   $termek = <<<DELIMETER
              <tr>
                  <td>{$row['termek_nev']}</td>
                  <td>{$row['termek_ar']}</td>
                  <td>{$row['termek_darabszam']}</td>
                  <td>2</td>
                  <td><a class='btn btn-warning' href="../resources/cart.php?remove={$row['termek_id']}"><span class='glyphicon glyphicon-minus'></span></a>   <a class='btn btn-success' href="../resources/cart.php?add={$row['termek_id']}"><span class='glyphicon glyphicon-plus'></span></a>
                  <a class='btn btn-danger' href="../resources/cart.php?delete={$row['termek_id']}"><span class='glyphicon glyphicon-remove'></span></a></td>
                    </tr>
   DELIMETER;
  
   echo $termek;
  
    }
  
  }
      

      }

  }

  
 }


?>