<?php 

//helper funkciók

$upload_directory = "uploads";

function last_id(){

global $connection;

return mysqli_insert_id( $connection);

}


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

  
$product_image = display_image($row['termek_kep']);

$product = <<<DELIMETER

<div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
        <a href="item.php?id={$row['termek_id']}"><img style="height:300px" src="../resources/{$product_image}" alt=""></a>
        <div class="caption">
            <h4 class="pull-right">{$row['termek_ar']} Ft</h4>
            <h4><a href="item.php?id={$row['termek_id']}">{$row['termek_nev']}</a>
            </h4>
            
             <a class="btn btn-primary" target="_blank" href="../resources/cart.php?add={$row['termek_id']}">Kosárba</a>
        </div>


       
    </div>
</div>

DELIMETER;

echo $product;


        }
    }
function get_kategoriak(){


    $query = query("SELECT * FROM kategoriak");
    confirm($query);
    
    while($row = fetch_array($query)) {
    
    
    $categories_links = <<<DELIMETER
    
    <a href='category.php?id={$row['kat_nev']}' class='list-group-item'>{$row['kat_nev']}</a>
    
    
    DELIMETER;
    
    echo $categories_links;
    
         }
    
    
    
    }
    
    
    
    

    function get_products_in_cat_page() {


        $query = query(" SELECT * FROM termekek WHERE termek_kategoria_id = " . escape_string($_GET['id']) . " ");
        confirm($query);
        
        while($row = fetch_array($query)) {
        
        $product_image = display_image($row['termek_kep']);
        
        $product = <<<DELIMETER
        
        
                    <div class="col-md-3 col-sm-6 hero-feature">
                        <div class="thumbnail">
                            <img src="../resources/{$product_image}" alt="">
                            <div class="caption">
                                <h3>{$row['termek_nev']}</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <p>
                                    <a href="../resources/cart.php?add={$row['termek_id']}" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['termek_id']}" class="btn btn-default">More Info</a>
                                </p>
                            </div>
                        </div>
                    </div>
        
        DELIMETER;
        
        echo $product;
        
        
                }
        
        
        }
        
        
        
        

    
    function get_products_in_shop_page() { 


        $query = query ("SELECT * FROM termekek");
        
        confirm($query);
        
        while ($row = fetch_array($query)) {
            $product_image =   display_image($row['termek_kep']);


        $termek = <<<DELIMETER
        
        <div class="col-md-3 col-sm-6 hero-feature">
        <div class="thumbnail">
            <img src="../resources/{$product_image}" alt="">
            <div class="caption">
                <h3>{$row['termek_nev']}</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <p>
                    <a href="../resources/cart.php?add={$row['termek_id']}" class="btn btn-primary">Kosárba</a> <a href="item.php?id={$row['termek_id']}" class="btn btn-default">Részletek</a>
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


function login_user (){

    if (isset($_POST['submit'])){

        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);

        $query = query("SELECT * FROM felhasznalok WHERE username = '{$username}' AND password = '{$password}' ");
        confirm($query);

if(mysqli_num_rows($query) == 0) {

set_message("Your Password or Username are wrong");
redirect("login.php");

 }else {
$_SESSION['username'] = $username;
redirect("admin");
 
 }


    }

}


/*************************BACK END FUNCTIONS */

function display_orders() {


$query = query ("SELECT * FROM rendelesek");
confirm($query);

while ($row = fetch_array($query)){

$orders = <<<DELIMETER

<tr> 

<td>{$row['rendeles_id']}</td>
<td>{$row['rendeles_amount']}</td>
<td>{$row['rendeles_transaction']}</td>
<td>{$row['rendeles_currency']}</td>
<td>{$row['rendeles_status']}</td>
<td><a class="btn btn-danger" href="../../resources/templates/back/delete_order.php?id={$row['rendeles_id']}"><spam class="glyphicon glyphicon-remove"></spam><a/></td>
</tr>

DELIMETER;

echo $orders;

}

}
/***************************admin termekek*************/
function display_image($picture) {

    global $upload_directory;
    
    return $upload_directory  . DS . $picture;
    
    
    
    }
    
    

function get_products_in_admin (){


    $query = query ("SELECT * FROM termekek");

    confirm($query);
    
    while ($row = fetch_array($query)) {

      $category =  show_product_category_title($row['termek_kategoria_id']);

   $product_image =   display_image($row['termek_kep']);
        
    
$termek = <<<DELIMETER
    <tr>
         <td>{$row['termek_id']}</td>
         <td>{$row['termek_nev']}<br>
        <a href="index.php?edit_product&id={$row['termek_id']}"><img width='100' src="../../resources/uploads/{$product_image}" alt=""></a>
         </td>
         <td>{$category}</td>
        <td>{$row['termek_ar']}</td>
        <td>{$row['termek_darabszam']}</td>
        <td><a class="btn btn-danger" href="../../resources/templates/back/delete_product.php?id={$row['termek_id']}"><spam class="glyphicon glyphicon-remove"></spam><a/></td>


</tr>
DELIMETER;
    
    echo $termek;
    
            }

}

/************************* add termekek //admin */

function add_product() {


    if(isset($_POST['publish'])) {


        $termek_nev         = escape_string($_POST['termek_nev']);
        $termek_kategoria_id   = escape_string($_POST['termek_kategoria_id']);
        $termek_ar         = escape_string($_POST['termek_ar']);
        $termek_leiras   = escape_string($_POST['termek_leiras']);
        $rovid_leiras          = escape_string($_POST['rovid_leiras']);
        $termek_darabszam      = escape_string($_POST['termek_darabszam']);
        $product_image          = escape_string($_FILES['file']['name']);
        $image_temp_location    = escape_string($_FILES['file']['tmp_name']);
        
        move_uploaded_file($image_temp_location  , UPLOAD_DIRECTORY . DS . $product_image);
        
        
        $query = query("INSERT INTO termekek (termek_nev, termek_kategoria_id, termek_ar, termek_leiras, rovid_leiras, termek_darabszam, termek_kep) VALUES('{$termek_nev}', '{$termek_kategoria_id}', '{$termek_ar}', '{$termek_leiras}', '{$rovid_leiras}', '{$termek_darabszam}', '{$product_image}')");
        $last_id = last_id();
        confirm($query);
        set_message("New Product with id {$last_id} was Added");
        redirect("index.php?products");
        
        
                }
        
        
        }
        

        function show_categories_add_product_page(){


            $query = query("SELECT * FROM kategoriak");
            confirm($query);
            
            while($row = fetch_array($query)) {
            
            
            $categories_options = <<<DELIMETER
            
            <option value="{$row[kat_id]}">{$row['kat_nev']}</option>
            
            
            DELIMETER;
            
            echo $categories_options;
            
                 }
            
            
            
            }
            


            /*************************updating termekek code */

            function update_product() {


                if(isset($_POST['update'])) {
            
            
                    $termek_nev         = escape_string($_POST['termek_nev']);
                    $termek_kategoria_id   = escape_string($_POST['termek_kategoria_id']);
                    $termek_ar         = escape_string($_POST['termek_ar']);
                    $termek_leiras   = escape_string($_POST['termek_leiras']);
                    $rovid_leiras          = escape_string($_POST['rovid_leiras']);
                    $termek_darabszam      = escape_string($_POST['termek_darabszam']);
                    $product_image          = escape_string($_FILES['file']['name']);
                    $image_temp_location    = escape_string($_FILES['file']['tmp_name']);
                    
                    if(empty( $product_image )) {

                     
                        $get_pic= query("SELECT termek_kep FROM  termekek WHERE termek_id =" .escape_string($_GET['id']). " ");
                        confirm ($get_pic);
                        while ($pic = fetch_array($get_pic)){

                            $product_image = $pic['termek_kep'];

                        }
                    }



                    move_uploaded_file($image_temp_location  , UPLOAD_DIRECTORY . DS . $product_image);
                    
                    
                    $query = "UPDATE termekek SET " ;
                    $query .= "termek_nev = '{$termek_nev}', " ;
                    $query .= "termek_kategoria_id = '{$termek_kategoria_id}', " ;
                    $query .= "termek_ar = '{$termek_ar}', " ;

                    $query .= "termek_leiras = '{$termek_leiras}', " ;
                    $query .= "rovid_leiras = '{$rovid_leiras}', " ;
                    $query .= "termek_darabszam = '{$termek_darabszam}', " ;
                    $query .= "termek_kep = '{$product_image}', " ;
                    $query .= "WHERE termek_id=" . escape_string($_GET['id']); ;





$send_update_query = query ($query);
                    confirm($query);
                    set_message("Termek frissitve.");
                    redirect("index.php?products");
                    
                    
                            }
                    
                    
                    }
                    


            function show_product_category_title($product_category_id){


                $category_query = query("SELECT * FROM kategoriak WHERE kat_id = '{$product_category_id}' ");
                confirm($category_query);
                
                while($category_row = fetch_array($category_query)) {
                
                return $category_row['kat_nev'];
                
                }
}

            
///////////////kategoriak admin


function show_categories_in_admin(){

    $category_query= $query =( "SELECT * FROM kategoriak");
    $category_query = query($query);

    confirm($category_query);

    while ($row = fetch_array($category_query)){
        $kat_id = $row ['kat_id'];

        $kat_nev= $row ['kat_nev'];

        $category = <<<DELIMETER




     <tr>
        <td>{$kat_id}</td>
        <td>{$kat_nev}</td>
        <td><a class="btn btn-danger" href="../../resources/templates/back/delete_category.php?id={$row['kat_id']}"><spam class="glyphicon glyphicon-remove"></spam><a/></td>

    </tr>



DELIMETER;

echo $category;

    }


}

function add_category(){

if(isset($_POST['add_category'])) {

$kat_nev = escape_string($_POST['kat_nev']);

if(empty($kat_nev) || $kat_nev == " "){

 echo "nem lehet üres mező!";
} else {



$insert_cat = query("INSERT INTO kategoriak(kat_nev) VALUES ('{$kat_nev}')");
confirm($insert_cat);

set_message("KATEGÓRIA LÉTREHOZVA");
redirect ("index.php?categories");

}
}

}

//////////////////admin felhasznalok

function display_users() {


    $category_query = query("SELECT * FROM felhasznalok");
    confirm($category_query);
    
    
    while($row = fetch_array($category_query)) {
    
    $user_id = $row['user_id'];
    $username = $row['username'];
    $email = $row['email'];
    $password = $row['password'];
    
    $user = <<<DELIMETER
    
    
    <tr>
        <td>{$user_id}</td>
        <td>{$username}</td>
         <td>{$email}</td>
        <td><a class="btn btn-danger" href="../../resources/templates/back/delete_user.php?id={$row['user_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>
    
    
    
DELIMETER;
    
    echo $user;
    
    
    
        }
    
    
    
    }
    function add_user() {


        if(isset($_POST['add_user'])) {
        
        
        $username   = escape_string($_POST['username']);
        $email      = escape_string($_POST['email']);
        $password   = escape_string($_POST['password']);
        // $user_photo = escape_string($_FILES['file']['name']);
        // $photo_temp = escape_string($_FILES['file']['tmp_name']);
        
        
        // move_uploaded_file($photo_temp, UPLOAD_DIRECTORY . DS . $user_photo);
        
        
        $query = query("INSERT INTO felhasznalok(username,email,password) VALUES('{$username}','{$email}','{$password}')");
        confirm($query);
        
        set_message("USER CREATED");
        
        redirect("index.php?users");
        
        
        
        }
        
        
        
        }
        
        
    



?>