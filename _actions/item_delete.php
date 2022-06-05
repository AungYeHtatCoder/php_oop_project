<?php 
// item delete
include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\ChapterOneTable;
$delete_item = new ChapterOneTable(new MySQL());
$delete_item->itemDelete($_GET['id']);
if ($delete_item) {
    echo "Item deleted successfully";
    header("Location: ../item_index.php");
} else {
    echo "Item not deleted";
    //header("Location: index.php");
}