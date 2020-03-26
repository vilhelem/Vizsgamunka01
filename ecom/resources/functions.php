<?php 

//helper funkciók
function redirect ($location){

    header("Location: $location");
}


function query($sql){

    global $connection;

    return mysqli_query($connection,$sql);
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
        <h4><a href="#">{$row['termek_nev']}</a>
        </h4>
        <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
    
    <a class="btn btn-primary" target="_blank" href="item.php?id={row['termek_id']}">KOSÁRBA</a>


</div>
</div>
DELIMETER;

echo $termek;

}





}






?>

