<?php require_once("../../config.php");


if(isset($_GET['id'])){

$query = query("DELETE FROM termekek WHERE termek_id = " . escape_string($_GET['id']) . " ");
confirm($query);
set_message("Termék Törölve");
redirect("../../../public/admin/index.php?products");
} else {

    redirect("../../../public/admin/index.php?products");


}



?>