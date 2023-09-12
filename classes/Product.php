<?php
declare(strict_types=1);

/*
 * PHP_Final_Project_Ecommerce Product.php
 * 
 * @author Mohammad Safaeirad (Lenovo)
 * @since 4/20/2023
 * (c) Copyright 2023 Mohammad Safaeirad 
 */


/**
 * @TODO   Documentation
 *
 * @author Mohammad Safaeirad
 * @since  4/20/2023
 */
require_once 'MySql.php';

class Product extends MySql{
    //get all products
    /**
     * @throws Exception
     */
    public function getAllProducts() : false|array {
        try{
            $conn = $this->connect();
            $query = "SELECT * FROM `products`";
            $statement = $conn->prepare($query);
            $statement->execute();
            
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Throwable $thrown){
            throw new Exception("Can Not Update current currency. ", 0, $thrown);
        }
    }
    
    /**
     * @throws Exception
     */
    public function getProductById($id) {
        try {
            $conn = $this->connect();
            $query = "SELECT * FROM `products` WHERE `id`=:id";
            $statement = $conn->prepare($query);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            
            $product = $statement->fetch(PDO::FETCH_ASSOC);
            return $product;
        } catch (\Throwable $thrown) {
            throw new Exception("Can not get product by ID.", 0, $thrown);
        }
    }
    
    /**
     * @throws Exception
     */
    public function createProduct(array $data) : bool {
        try {
            $conn = $this->connect();
            $query = "INSERT INTO `products`(`name`, `description`,`category`, `price`, `img`, `created_at`)
                  VALUES (:name,:description,:category,:price,:img,CURRENT_TIME())";
            $statement = $conn->prepare($query);
            $statement->bindParam(':name', $data['name'], PDO::PARAM_STR);
            $statement->bindParam(':description', $data['description'], PDO::PARAM_STR);
            $statement->bindParam(':category', $data['category'], PDO::PARAM_STR);
            $statement->bindParam(':price', $data['price'], PDO::PARAM_STR);
            $statement->bindParam(':img', $data['img'], PDO::PARAM_STR);
            $result = $statement->execute();
            
            return $result;
        } catch (\Throwable $thrown) {
            throw new Exception("Can not create product. ", 0, $thrown);
        }
    }
    
    /**
     * @throws Exception
     */
    public function updateProduct($id, array $data) : bool {
        try {
            $conn = $this->connect();
            $query = "UPDATE `products` SET
                    `name`=:name,
                    `description`=:description,
                    `category`=:category,
                    `price`=:price
                  WHERE `id`=:id";
            $statement = $conn->prepare($query);
            $statement->bindParam(':name', $data['name'], PDO::PARAM_STR);
            $statement->bindParam(':description', $data['description'], PDO::PARAM_STR);
            $statement->bindParam(':category', $data['category'], PDO::PARAM_STR);
            $statement->bindParam(':price', $data['price'], PDO::PARAM_STR);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $result = $statement->execute();
            
            return $result;
        } catch (\Throwable $thrown) {
            throw new Exception("Can not update product. ", 0, $thrown);
        }
    }
    
    
    /**
     * @throws Exception
     */
    public function deleteProduct($id) : bool {
        try {
            $conn = $this->connect();
            $query = "DELETE FROM `products` WHERE `id`=:id";
            $statement = $conn->prepare($query);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $result = $statement->execute();
            
            return $result;
        } catch (\Throwable $thrown) {
            throw new Exception("Can not delete product. ", 0, $thrown);
        }
    }
}



?>