<?php add_product(); ?>
<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Termék hozzáadása
</h1>
</div>
               


<form action="" method="post" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Termék neve </label>
        <input type="text" name="termek_nev" class="form-control">
       
    </div>


    <div class="form-group">
           <label for="product-title">Termék leírása</label>
      <textarea name="termek_leiras" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>



    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Termék ára</label>
        <input type="number" name="termek_ar" class="form-control" size="60">
      </div>
    </div>



    <div class="form-group">
           <label for="product-title">Termék rövid leírása</label>
      <textarea name="rovid_leiras" id="" cols="30" rows="3" class="form-control"></textarea>
    </div>




</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     
     <div class="form-group">
       <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">
        <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
    </div>


     <!-- Product Categories-->

    <div class="form-group">
         <label for="product-title">Termék kategóriája</label>

        <select name="termek_kategoria_id" id="" class="form-control">
            <option value="">Válassz kategóriát</option>
<?php show_categories_add_product_page(); ?>
            
           
        </select>


</div>





    <!-- Product Brands-->


    <div class="form-group">
      <label for="product-title">Darabszám</label>
        <input type="number" name="termek_darabszam" class="form-control">
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
        <label for="product-title">Termék kép</label>
        <input type="file" name="file">
      
    </div>



</aside><!--SIDEBAR-->


    
</form>
