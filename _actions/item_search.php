<?php
// item search
include("../vendor/autoload.php");
use Libs\Database\MySQL;
   use Libs\Database\ChapterOneTable;
   $item_data = new ChapterOneTable(new MySQL());
   
   $search_item = $_POST['search_item'];
   $item_data->itemSearch($search_item);
   foreach ($item_data->itemSearch($search_item) as $item) {
       ?>
<table>
 <tr>
  <td><?php echo $item->id; ?></td>
  <td><?php echo $item->item_name; ?></td>
  <td><?php echo $item->price; ?></td>
  <td><?php echo $item->quantity; ?></td>
  <td><?php echo $item->created_at; ?></td>
  <!-- <td><?php //echo $item->updated_at; ?></td> -->
  <td>
   <a href="_actions/item_delete.php?id=<?php echo $item->id; ?>" class="btn btn-danger">Delete</a>
   <a href="item_edit.php?id=<?php echo $item->id; ?>" class="btn btn-warning">Edit</a>
  </td>
 </tr>
 <?php
   }
   ?>
</table>