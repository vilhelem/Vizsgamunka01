


<div class="col-md-12">
<div class="row">
<h1 class="page-header">
   All Orders

</h1>

<h4 class="bg-danger"><?php display_message(); ?></h4>

</div>

<div class="row">
<table class="table table-hover">
    <thead>

      <tr>
           <th>ID</th>
           <th>Összeg</th>
           <th>Transaction</th>
           <th>Pénznem</th>
           <th>Státusz</th>
    
      </tr>
    </thead>
    <tbody>
        <?php display_orders(); ?>
        

    </tbody>
</table>
</div>









 

        <?php include(TEMPLATE_BACK . "/footer.php"); ?>
