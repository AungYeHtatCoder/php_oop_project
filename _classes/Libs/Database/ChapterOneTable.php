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
   $query = "INSERT INTO chapter_one (item_name, price, created_at, updated_at) VALUES (:item_name, :price, NOW(), NOW())";
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

 // calculate average price of items
 public function getAveragePrice()
 {
  try {
   $query = "SELECT AVG(price) AS average_price FROM chapter_one";
   $statement = $this->db->connect()->prepare($query);
   $statement->execute();
   $average_price = $statement->fetch();
   return $average_price;
  } catch (PDOException $e) {
   echo "Select Error: " . $e->getMessage();
  }
 }

 // calculate minimum price of items
 public function getMinimumPrice()
 {
  try {
   $query = "SELECT MIN(price) AS minimum_price FROM chapter_one";
   $statement = $this->db->connect()->prepare($query);
   $statement->execute();
   $minimum_price = $statement->fetch();
   return $minimum_price;
  } catch (PDOException $e) {
   echo "Select Error: " . $e->getMessage();
  }
 }

 // calculate maximum price of items
 public function getMaximumPrice()
 {
  try {
   $query = "SELECT MAX(price) AS maximum_price FROM chapter_one";
   $statement = $this->db->connect()->prepare($query);
   $statement->execute();
   $maximum_price = $statement->fetch();
   return $maximum_price;
  } catch (PDOException $e) {
   echo "Select Error: " . $e->getMessage();
  }
 }
}

// https://github.com/AungYeHtatCoder/php_oop_project