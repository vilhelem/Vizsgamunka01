<?php require_once("config.php"); ?>

<?php 


if(isset($_GET['add'])) {


    $query = query("SELECT * FROM termekek WHERE termek_id=" . escape_string($_GET['add']). " ");
    confirm($query);

    while($row = fetch_array($query)) {


      if($row['termek_darabszam'] != $_SESSION['termek_' . $_GET['add']]) {

        $_SESSION['termek_' . $_GET['add']]+=1;
        redirect("../public/checkout.php");


      } else {


        set_message("Csak  " . $row['termek_darabszam'] . " " . "{$row['termek_nev']}" . " van raktáron");
        redirect("../public/checkout.php");



      }



    }


    /*$_SESSION['product_' . $_GET['add']]  +=1;

    redirect("index.php"); */

}








if(isset($_GET['remove'])) {

$_SESSION['termek_' . $_GET['remove']]--; //lehet rossz lesz

if ($_SESSION['termek_' . $_GET['remove']] < 1) {

  unset($_SESSION['item_total']);
  unset($_SESSION['item_quantity']);  
redirect("../public/checkout.php");

} else {

  redirect("../public/checkout.php");

}


}

if(isset($_GET['delete'])) {

    $_SESSION['termek_' . $_GET['delete']] ='0';
    unset($_SESSION['item_total']);
    unset($_SESSION['item_quantity']);


    redirect("../public/checkout.php");


}




 function cart() {
  $item_quantity = 0;
  $total = 0;

  $item_name = 1;
  $item_number =1;
  $amount =1;
  $quantity =1;
foreach ($_SESSION as $name => $value) {

  if($value > 0) {

    if (substr($name, 0, 7 ) == "termek_") { 

      $length = strlen($name ); //$length = strlen($name -7 ); eredetileg igy kene, de nem mukodott

$id = substr($name, 7 , $length);

 $query = query("SELECT * FROM termekek WHERE termek_id = " . escape_string($id). " "); 
 confirm($query);
 
   while($row = fetch_array($query)) {
 
    $sub = $row['termek_ar']*$value; //termek darab*termek ar
    $item_quantity +=$value;
   $product_image= display_image($row['termek_kep']);

  $termek = <<<DELIMETER
             <tr>
                 <td>{$row['termek_nev']}<br>
                 
                 <img width='100' src='../resources/{$product_image}'>
                 
                 </td>
                 <td>{$row['termek_ar']} Ft</td>
                 <td>{$value}</td>
                 <td>{$sub} Ft</td>
                 <td><a class='btn btn-warning' href="../resources/cart.php?remove={$row['termek_id']}"><span class='glyphicon glyphicon-minus'></span></a>   <a class='btn btn-success' href="../resources/cart.php?add={$row['termek_id']}"><span class='glyphicon glyphicon-plus'></span></a>
                 <a class='btn btn-danger' href="../resources/cart.php?delete={$row['termek_id']}"><span class='glyphicon glyphicon-remove'></span></a></td>
                   </tr>

                   <input type="hidden" name="item_name_{$item_name}" value="{$row['termek_nev']}">
                   <input type="hidden" name="item_number_{$item_number}" value="{$row['termek_id']}">
                   <input type="hidden" name="amount_{$amount}" value="{$row['termek_ar']}">
                   <input type="hidden" name="quantity_{$quantity}" value="{$value}">

DELIMETER;
 
  echo $termek;

  $item_name++;
  $item_number ++;
  $amount ++;
  $quantity++;
  

}

$_SESSION['item_total'] = $total += $sub;    //teljes osszeg
$_SESSION['item_quantity'] = $item_quantity; //termekek db



             }






  }





        }






      }

  function show_paypal(){

if(isset($_SESSION['item_quantity']) && $_SESSION['item_quantity'] >= 1)  {


$paypal_button = <<<DELIMETER

<input type="image" name="upload"
    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
    alt="PayPal - The safer, easier way to pay online">

DELIMETER;
return $paypal_button;
  }

  }




  function process_transaction() {

  

    if(isset($_GET['tx'])){

      $amount =  $_GET['amt'];
      $currency= $_GET['cc'];
      $transaction =  $_GET['tx'];
      $status = $_GET['st'];
  
  
  
  
  


    $item_quantity = 0;
    $total = 0;
 
  foreach ($_SESSION as $name => $value) {
  
    if($value > 0) {
  
      if (substr($name, 0, 7 ) == "termek_") { 
  
        $length = strlen($name ); //$length = strlen($name -7 ); eredetileg igy kene, de nem mukodott
        $id = substr($name, 7 , $length);


        
  
      $send_order = query("INSERT INTO rendelesek (rendeles_amount, rendeles_transaction, rendeles_currency, rendeles_status ) VALUES('{$amount}', '{$transaction}','{$currency}','{$status}')");
  
      $last_id=  last_id();
       confirm($send_order);
  
   $query = query("SELECT * FROM termekek WHERE termek_id = " . escape_string($id). " "); 
   confirm($query);
   
     while($row = fetch_array($query)) {
      $product_price = $row['termek_ar'];
      $product_title = $row['termek_nev'];

      $sub = $row['termek_ar']*$value; //termek darab*termek ar
      $item_quantity +=$value;
    

      
    $insert_report = query("INSERT INTO reports (termek_id, rendeles_id, termek_nev, termek_ar, termek_darabszam) VALUES('{$id}','{$last_id}','{$product_title}','{$product_price}','{$value}')");

    confirm($insert_report);

  }
  
  $total += $sub;   
  echo $item_quantity; //teljes osszeg
  
 
  
               }
  
              }
             }
             
            }
            
            else {
                redirect("index.php");
            }
  
  
          }




?>