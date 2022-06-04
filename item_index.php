<?php 
 include("vendor/autoload.php");
 use Libs\Database\MySQL;
 use Libs\Database\ChapterOneTable;
 $item_data = new ChapterOneTable(new MySQL());
include("layouts/head.php")
?>

<?php 
include("layouts/navbar.php")
?>

<body>
 <div class="container">
  <div class="row">
   <div class="col-lg-8">
    <div class="card">
     <div class="card-header">
      <h3><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Product Item Create
       </button>
       <span style="float:right;">
        <div class="p-1 mb-2 bg-warning text-white"><?php 
        $total_prices = $item_data->getTotalPrice();
        echo "<h4> Product Total Prices : " . $total_prices->total_price . "</h4>";
        ?>
         <span>
          <?php 
         // $averages = $item_data->getAveragePrice();
         // echo "<h4> Product Average Prices : " . $averages->average_price . "</h4>";
         ?>
         </span>
        </div>
       </span>
      </h3>
     </div>
     <div class="card-body">
      <table class="table table-responsive">
       <thead>
        <tr>
         <th>ID</th>
         <th>Product Name</th>
         <th> Price</th>
         <th>Created At</th>
         <th>Updated At</th>
         <th>Action</th>
        </tr>
       </thead>
       <tbody>
        <tr>
         <?php 
         include("vendor/autoload.php");
         //use Libs\Database\MySQL;
         //use Libs\Database\ChapterOneTable;
         //$item_data = new ChapterOneTable(new MySQL());
         $item_data->getItems();
         foreach ($item_data->getItems() as $item) {
             ?>
         <td><?php echo $item->id; ?></td>
         <td><?php echo $item->item_name; ?></td>
         <td><?php echo $item->price; ?></td>
         <td><?php echo $item->created_at; ?></td>
         <td><?php echo $item->updated_at; ?></td>
         <td>
          <a href="item_detele.php?id=<?php echo $item->id; ?>" class="btn btn-danger">Delete</a>
          <a href="item_edit.php?id=<?php echo $item->id; ?>" class="btn btn-warning">Edit</a>
         </td>
        </tr>
        <?php
         }
         ?>
        </tr>

       </tbody>
      </table>
     </div>
    </div>
   </div>
   <div class="col-lg-4">
    <div class="card">
     <div class="header">
      <h3 class="bg-primary text-white">Product Total Amount</h3>
     </div>
     <div class="card-body">
      <table class="table table-responsive bg-dark text-white">
       <tr>
        <th>Total Price</th>
        <td><?php
         $total_prices = $item_data->getTotalPrice();
         echo "<h4> Total Price : " . $total_prices->total_price . "</h4>";
         ?></td>
       </tr>
       <tr>
        <th>Minimum Price</th>
        <td>
         <?php 
        
        $min_price = $item_data->getMinimumPrice();
        echo "<h4> Min Price : " . $min_price->minimum_price . "</h4>";
      
        ?>
        </td>

       <tr>
        <th>Maximum Price</th>
        <td>
         <?php
         $max_price = $item_data->getMaximumPrice();
         echo "<h4> Max Price : " . $max_price->maximum_price . "</h4>";
         ?>
        </td>
       </tr>
       <tr>
        <th>Average Price</th>
        <td>
         <?php 
         $averages = $item_data->getAveragePrice();
         echo "<h4> Product Average Prices : " . $averages->average_price . "</h4>";
         ?>
        </td>
       </tr>
      </table>
     </div>
    </div>
   </div>
  </div>
 </div>

 <!-- item create modal  -->

 <!-- Button trigger modal -->


 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel">Product Item Create</h5>
     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
     <form action="_actions/item_create.php" method="POST">
      <div class="mb-3">
       <label for="Item" class="form-label">Product Name</label>
       <input type="text" name="item_name" class="form-control" id="item_name" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
       <label for="price" class="form-label">Product Price</label>
       <input type="number" name="price" class="form-control" id="price">
      </div>

      <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       <input type="submit" class="btn btn-primary" value="Product Create">
      </div>
     </form>
    </div>

   </div>
  </div>
 </div>
 <?php 
include("layouts/footer.php")
?>