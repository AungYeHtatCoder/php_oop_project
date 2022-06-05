<?php
namespace Libs\Database;
use PDOException;
class OrderTable 
{
 private $db = null;

 public function __construct(MySQL $db)
 {
     $this->db = $db;
 }

 // get orders
 public function getOrders()
 {
     try {
         $query = "SELECT * FROM orders";
         $statement = $this->db->connect()->prepare($query);
         $statement->execute();
         $orders = $statement->fetchAll();
         return $orders;
     } catch (PDOException $e) {
         echo "Select Error: " . $e->getMessage();
     }
 }

 // Calculate Daily Revenue
 public function getDailyRevenue()
 {
//      $query = "select date(order_date),sum(price*quantity) 
// from products,orders 
// where products.id=orders.product_id 
// group by date(order_date)";

$query = "select date(order_date) orders.product_id as product_id,sum(price*quantity) form left join orders on orders.product_id=products.id group by date(order_date)";
  $statement = $this->db->connect()->prepare($query);
  $statement->execute();
  $daily_revenue = $statement->fetchAll();
  return $daily_revenue;
  
 }
 // public function getDailyRevenue()
 // {
 //     try {
 //         $query = "SELECT SUM(total) AS daily_revenue FROM orders WHERE created_at >= DATE_SUB(NOW(), INTERVAL 1 DAY)";
 //         $statement = $this->db->connect()->prepare($query);
 //         $statement->execute();
 //         $daily_revenue = $statement->fetch();
 //         return $daily_revenue;
 //     } catch (PDOException $e) {
 //         echo "Select Error: " . $e->getMessage();
 //     }
 // }
}