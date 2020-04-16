<?php require_once("../../config.php");


if(isset($_GET['id'])){

$query = query("DELETE FROM kategoriak WHERE kat_id = " . escape_string($_GET['id']) . " ");
confirm($query);
set_message("Kategoria torolve");
redirect("../../../public/admin/index.php?categories");
} else {

    redirect("../../../public/admin/index.php?categories");


}



?>