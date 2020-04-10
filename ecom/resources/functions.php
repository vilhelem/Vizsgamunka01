<?php 

//helper funkciók
function redirect ($location){

    header("Location: $location");
}


function query($sql){

    global $connection;

    return mysqli_query($connection,$sql);
}


function set_message($msg){

    if(!empty($msg)) {
    
    $_SESSION['message'] = $msg;
    
    } else {
    
    $msg = "";
    
    
        }
    
    
    }
    
    
    function display_message() {
    
        if(isset($_SESSION['message'])) {
    
            echo $_SESSION['message'];
            unset($_SESSION['message']);
    
        }
    
    
    
    }
    


function confirm($result){
    global $connection;

    if(!$result) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
}

function escape_string ($string){
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result){

    return mysqli_fetch_array($result);
}

/*************************FRONT END FUNCTIONS */

//get termékek

function get_products() { 


$query = query ("SELECT * FROM termekek");

confirm($query);

while ($row = fetch_array($query)) {

$termek = <<<DELIMETER

<div class="col-sm-4 col-lg-4 col-md-4">
<div class="thumbnail">
  <a href="item.php?id={$row['termek_id']}">  <img src="{$row['termek_kep']}" alt="">
    <div class="caption">
        <h4 class="pull-right">{$row['termek_ar']}Ft</h4>
        <h4><a href="item.php?id={$row['termek_id']}">{$row['termek_nev']}</a>
        </h4>
        <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
    
    <a class="btn btn-primary" target="_blank" href="cart.php?add={$row['termek_id']}">KOSÁRBA</a>


</div>
</div>
DELIMETER;

echo $termek;

        }





}

function get_kategoriak(){


    $query = query("SELECT * FROM kategoriak");
    confirm($query);
    
    while($row = fetch_array($query)) {
    
    
    $categories_links = <<<DELIMETER
    
    <a href='category.php?id={$row['kat_id']}' class='list-group-item'>{$row['kat_nev']}</a>
    
    
    DELIMETER;
    
    echo $categories_links;
    
         }
    
    
    
    }
    
    
    
    

function get_products_in_cat_page() { 


    $query = query ("SELECT * FROM termekek WHERE termek_kategoria_id = " . escape_string($_GET['id']) . " ");
    
    confirm($query);
    
    while ($row = fetch_array($query)) {
    
    $termek = <<<DELIMETER
    
    <div class="col-md-3 col-sm-6 hero-feature">
    <div class="thumbnail">
        <img src="{$row['termek_kep']}" alt="">
        <div class="caption">
            <h3>{$row['termek_nev']}</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>
                <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['termek_id']}" class="btn btn-default">More Info</a>
            </p>
        </div>
    </div>
</div>

DELIMETER;
    
    echo $termek;
    
            }
    
    
    
    
    
    }
    

    
    function get_products_in_shop_page() { 


        $query = query ("SELECT * FROM termekek");
        
        confirm($query);
        
        while ($row = fetch_array($query)) {
        
        $termek = <<<DELIMETER
        
        <div class="col-md-3 col-sm-6 hero-feature">
        <div class="thumbnail">
            <img src="{$row['termek_kep']}" alt="">
            <div class="caption">
                <h3>{$row['termek_nev']}</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <p>
                    <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['termek_id']}" class="btn btn-default">More Info</a>
                </p>
            </div>
        </div>
    </div>
    
    DELIMETER;
        
        echo $termek;
        
                }
        
        
        
        
        
        }
        
        
function send_message(){

    if(isset($_POST['submit'])){
   
        $to           = "patrikvilhelem@gmail.com";
        $from_name    = $_POST['name'];
        $subject      = $_POST['subject'];
        $email        = $_POST['email'];
        $message      = $_POST['message'];


        $headers = "From: {$from_name} {$email}";

       $result = mail($to, $subject, $message, $headers);

       if (!$result) {
           set_message("Sorry we codnt send your mesage");
           redirect("contact.php"); //lefrissíti az oldalt
    
       }
       else {
           set_message("Your message has been sent");
       }
    }
}




/*************************BACK END FUNCTIONS */


?>

