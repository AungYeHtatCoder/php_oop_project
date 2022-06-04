<?php 
include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\ChapterOneTable;

$item = [
 "item_name" => $_POST['item_name'] ?? "Unknown",
 "price" => $_POST['price'] ?? 0,
 //"total" => $_POST['total'] ?? 0,
];
$item_table = new ChapterOneTable(new MySQL());
$item_table->itemInsert($item);
if ($item_table) {
    //echo "Item inserted successfully";
    header("Location: ../item_index.php");
}
// } else {
//  echo "Item not inserted";
//  //header("Location: index.php");
// }
?>