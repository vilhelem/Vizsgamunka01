<?php 

if(isset($_GET['id'])) {


$query = query("SELECT * FROM termekek WHERE termek_id = " . escape_string($_GET['id']) . " ");
confirm($query);

while($row = fetch_array($query)){


    $termek_nev         = escape_string($row['termek_nev']);
        $termek_kategoria_id   = escape_string($row['termek_kategoria_id']);
        $termek_ar         = escape_string($row['termek_ar']);
        $termek_leiras   = escape_string($row['termek_leiras']);
        $rovid_leiras          = escape_string($row['rovid_leiras']);
        $termek_darabszam      = escape_string($row['termek_darabszam']);
        $product_image          = escape_string($row['termek_kep']);
    }
    $product_image =   display_image($row['termek_kep']);
update_product();

}






?>
<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Termék módosítása
</h1>
</div>
               


<form action="" method="post" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Product Title </label>
        <input type="text" name="termek_nev" class="form-control" value="<?php echo  $termek_nev ;  ?>">
       
    </div>


    <div class="form-group">
           <label for="product-title">Product Description</label>
      <textarea name="termek_leiras" id="" cols="30" rows="10" class="form-control"><?php echo $termek_leiras; ?></textarea>
    </div>



    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Product Price</label>
        <input type="number" name="termek_ar" class="form-control" size="60" value="<?php echo $termek_ar; ?> ">
      </div>
    </div>



    <div class="form-group">
           <label for="product-title">Product Short Description</label>
      <textarea name="rovid_leiras" id="" cols="30" rows="3" class="form-control" value="<?php echo $rovid_leiras; ?> "></textarea>
    </div>




</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     
     <div class="form-group">
       <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">
        <input type="submit" name="update" class="btn btn-primary btn-lg" value="update">
    </div>


     <!-- Product Categories-->

    <div class="form-group">
         <label for="product-title">Product Category</label>

        <select name="termek_kategoria_id" id="" class="form-control">
            <option value="">Select Category</option>
<?php show_categories_add_product_page(); ?>
            
           
        </select>


</div>





    <!-- Product Brands-->


    <div class="form-group">
      <label for="product-title">Darabszám</label>
        <input type="number" name="termek_darabszam" class="form-control" value="<?php echo $termek_darabszam; ?> ">
    </div>


<!-- Product Tags -->


   <!--  <div class="form-group">
          <label for="product-title">Product Keywords</label>
          <hr>
        <input type="text" name="product_tags" class="form-control">
    </div>
 -->
    <!-- Product Image -->
    <div class="form-group">
        <label for="product-title">Product Image</label>
        <input type="file" name="file">
      
      <img src="../../resources<?php echo $product_image; ?>" alt="">
    </div>



</aside><!--SIDEBAR-->


    
</form>
