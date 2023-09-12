<?php
declare(strict_types=1);

/*
 * PHP_Final_Project_Ecommerce Category.php
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

class category extends MySql{
    
    /**
     * @throws Exception
     */
    public function getAllCategories(): array {
        try {
            $conn = $this->connect();
            $query = "SELECT * FROM `categories`";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $categories = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $categories;
        } catch (\Throwable $thrown){
            throw new Exception("Can Not Get All Categories. ", 0, $thrown);
        }
    }
    
    /**
     * @throws Exception
     */
    public function getCategoryById($id) {
        try {
            $conn = $this->connect();
            $query = "SELECT * FROM `categories` WHERE `category_id`=?";
            $stmt = $conn->prepare($query);
            $stmt->execute([$id]);
            $category = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $category ? $category : null;
        } catch (\Throwable $thrown){
            throw new Exception("Can Not Get Category by ID. ", 0, $thrown);
        }
    }
    
    /**
     * @throws Exception
     */
    public function createCategory(string $type): bool {
        try {
            $conn = $this->connect();
            $query = "INSERT INTO `categories`(`type`) VALUES (:type)";
            $statement = $conn->prepare($query);
            $statement->bindParam(':type', $type, PDO::PARAM_STR);
            $result = $statement->execute();
            
            return $result;
        } catch (\Throwable $thrown) {
            throw new Exception("Can not create category. ", 0, $thrown);
        }
    }
    
    /**
     * @throws Exception
     */
    public function updateCategory(int $id, string $type): bool {
        try {
            $conn = $this->connect();
            $query = "UPDATE `categories` SET `type`=:type WHERE `category_id`=:id";
            $statement = $conn->prepare($query);
            $statement->bindParam(':type', $type, PDO::PARAM_STR);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $result = $statement->execute();
            
            return $result;
        } catch (\Throwable $thrown) {
            throw new Exception("Can not update category. ", 0, $thrown);
        }
    }
    
    /**
     * @throws Exception
     */
    public function deleteCategory(int $id): bool {
        try {
            $conn = $this->connect();
            $query = "DELETE FROM `categories` WHERE `category_id`=:id";
            $statement = $conn->prepare($query);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $result = $statement->execute();
            
            return $result;
        } catch (\Throwable $thrown) {
            throw new Exception("Can not delete category. ", 0, $thrown);
        }
    }
}

?>