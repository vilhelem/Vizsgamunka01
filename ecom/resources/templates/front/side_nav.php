<div class="col-md-3">
                <p class="lead">Órasziget</p>
                <div class="list-group">

                <?php 
                
                
                $query = "SELECT * FROM kategoriak";
                $send_query = mysqli_query($connection, $query);
if(!$send_query){
    die("QUERY FAILED" . mysqli_error($connection));
}

                while($row= mysqli_fetch_array($send_query)){

                  echo  "<a href='' class='list-group-item'>{$row['kat_nev']}</a>";

                }
                
                
                ?>


                </div>
            </div>

