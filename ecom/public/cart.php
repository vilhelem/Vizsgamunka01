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

  $total = 0;

foreach ($_SESSION as $name => $value) {

  if($value > 0) {

    if (substr($name, 0, 7 ) == "termek_") { 

      $length = strlen($name ); //$length = strlen($name -7 ); eredetileg igy kene, de nem mukodott

$id = substr($name, 7 , $length);

 $query = query("SELECT * FROM termekek WHERE termek_id = " . escape_string($id). " "); 
 confirm($query);
 
   while($row = fetch_array($query)) {
 
    $sub = $row['termek_ar']*$value; //termek darab*termek ar
 
  $termek = <<<DELIMETER
             <tr>
                 <td>{$row['termek_nev']}</td>
                 <td>{$row['termek_ar']} Ft</td>
                 <td>{$value}</td>
                 <td>{$sub} Ft</td>
                 <td><a class='btn btn-warning' href="../public/cart.php?remove={$row['termek_id']}"><span class='glyphicon glyphicon-minus'></span></a>   <a class='btn btn-success' href="../public/cart.php?add={$row['termek_id']}"><span class='glyphicon glyphicon-plus'></span></a>
                 <a class='btn btn-danger' href="../public/cart.php?delete={$row['termek_id']}"><span class='glyphicon glyphicon-remove'></span></a></td>
                   </tr>
DELIMETER;
 
  echo $termek;


}

$_SESSION['item_total'] = $total += $sub;



             }






  }





        }






      }

  


?>