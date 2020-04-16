<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php") ?>






    <!-- Page Content -->
    <div class="container">


<!-- /.row --> 

<div class="row">
<h4 class="text-center bg-danger" ><?php display_message(); ?></h4>
      <h1>Kosár</h1>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="business" value="vizsgashopadm@gmail.com">
<input type="hidden" name="upload" value="1">
    <table class="table table-striped">
        <thead>
          <tr>
           <th>Termék</th>
           <th>Ár</th>
           <th>Darabszám</th>
           <th>Teljes összeg</th>
     
          </tr>
        </thead>
        <tbody>
            <?php cart(); ?>
        </tbody>
    </table>
    <?php echo show_paypal(); ?>
</form>



<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right ">
<h2>Kosár tartalma:</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Termékek:</th>
<td><span class="amount"><?php echo isset ($_SESSION['item_quantity'])  ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] ="0";
?></span></td>
</tr>
<tr class="shipping">
<th>Szállítás</th>
<td>Ingyenes kiszállítás</td>
</tr>

<tr class="order-total">
<th>Rendelés végösszege</th>
<td><strong><span class="amount">
<?php echo isset ($_SESSION['item_total'])  ? $_SESSION['item_total'] : $_SESSION['item_total'] ="0";
?>



Ft </span></strong> </td>
</tr>


</tbody>

</table>

</div><!-- CART TOTALS-->


 </div><!--Main Content-->


           <hr>


    </div>
    <!-- /.container -->

    <?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
