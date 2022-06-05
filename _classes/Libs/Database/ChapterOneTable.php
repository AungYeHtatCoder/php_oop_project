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
   $query = "INSERT INTO products (item_name, price, quantity, created_at, updated_at) VALUES (:item_name, :price, :quantity, NOW(), NOW())";
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
   $query = "SELECT * FROM products";
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
   $query = "SELECT SUM(price) AS total_price FROM products";
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
   $query = "SELECT AVG(price) AS average_price FROM products";
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
   $query = "SELECT MIN(price) AS minimum_price FROM products";
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
   $query = "SELECT MAX(price) AS maximum_price FROM products";
   $statement = $this->db->connect()->prepare($query);
   $statement->execute();
   $maximum_price = $statement->fetch();
   return $maximum_price;
  } catch (PDOException $e) {
   echo "Select Error: " . $e->getMessage();
  }
 }

 // delete item
 public function itemDelete($id)
 {
  try {
   $query = "DELETE FROM products WHERE id = :id";
   $statement = $this->db->connect()->prepare($query);
   $statement->execute(['id' => $id]);
  } catch (PDOException $e) {
   echo "Delete Error: " . $e->getMessage();
  }
 }

 // get product * quantity
 

 // get item by id
 public function getItem($id)
 {
  try {
   $query = "SELECT * FROM products WHERE id = :id";
   $statement = $this->db->connect()->prepare($query);
   $statement->execute(['id' => $id]);
   $item = $statement->fetch();
   return $item;
  } catch (PDOException $e) {
   echo "Select Error: " . $e->getMessage();
  }
 }

 // get month sales
 public function getMonthSales()
 {
  try {
   $query = "SELECT MONTHNAME(created_at) AS month, SUM(price) AS total_price FROM products GROUP BY MONTH(created_at)";
   $statement = $this->db->connect()->prepare($query);
   $statement->execute();
   $month_sales = $statement->fetchAll();
   return $month_sales;
  } catch (PDOException $e) {
   echo "Select Error: " . $e->getMessage();
  }
 }
}

// https://github.com/AungYeHtatCoder/php_oop_project