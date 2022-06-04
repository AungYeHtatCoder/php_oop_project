<?php 
namespace Libs\Database;
use PDOException;

class ChapterOneTable
{
 private $db = null;

 public function __construct(MySQL $db)
 {
  $this->db = $db;
 }

 public function itemInsert($item)
 {
  try {
   $query = "INSERT INTO chapter_one (item_name, price, total, created_at, updated_at) VALUES (:item_name, :price, :total, NOW(), NOW())";
   $statement = $this->db->connect()->prepare($query);
   //$statement = $this->db->prepare($query);
   $statement->execute($item);
  } catch (PDOException $e) {
   echo "Insert Error: " . $e->getMessage();
  }
 }


 // get items
 public function getItems()
 {
  try {
   $query = "SELECT * FROM chapter_one";
   $statement = $this->db->connect()->prepare($query);
   $statement->execute();
   $items = $statement->fetchAll();
   return $items;
  } catch (PDOException $e) {
   echo "Select Error: " . $e->getMessage();
  }
 }
 // get total price of items
 public function getTotalPrice()
 {
  try {
   $query = "SELECT SUM(price) AS total_price FROM chapter_one";
   $statement = $this->db->connect()->prepare($query);
   $statement->execute();
   $total_price = $statement->fetch();
   return $total_price;
  } catch (PDOException $e) {
   echo "Select Error: " . $e->getMessage();
  }
 }
}