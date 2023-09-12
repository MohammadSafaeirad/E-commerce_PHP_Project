<?php
declare(strict_types=1);

/*
 * PHP_Final_Project_Ecommerce admin.php
 * 
 * @author Mohammad Safaeirad (Lenovo)
 * @since 4/20/2023
 * (c) Copyright 2023 Mohammad Safaeirad 
 */


/**
 *
 * @author Mohammad Safaeirad
 * @since  4/20/2023
 */
require_once 'MySql.php';

class Admin extends MySql{
    
    /**
     * @throws Exception
     */
    public function attempt($email, $hashed_password) : ?array {
        try {
            $conn = $this->connect();
            $statement = $conn->prepare("SELECT * FROM `admins`
                  WHERE `email`= ? and `password`= ? ;"
            );
            $statement->bindParam(1, $email, PDO::PARAM_STR);
            $statement->bindParam(2, $hashed_password, PDO::PARAM_STR);
            $statement->execute();
            $result_set =$statement->fetchAll(\PDO::FETCH_ASSOC);
            
            $numResults = count($result_set);
            
            if ($numResults == 0) {
                
                return null;
            } elseif ($numResults > 1) {
                throw new Exception("Multiple results found for primary-key conditional statement!");
            }
            
            return $result_set;
            
            
        } catch (Exception $exception) {
            
            throw new Exception("Failed to email and password from the database.", 0, $exception);
        }
    }
    
    
    /**
     * @throws Exception
     */
    public function create($username, $email, $password) : bool {
        try {
            $conn = $this->connect();
            $statement = $conn->prepare("INSERT INTO `admins`(`username`, `email`, `password`)
              VALUES (?, ?, ?);"
            );
            $statement->bindParam(1, $username, PDO::PARAM_STR);
            $statement->bindParam(2, $email, PDO::PARAM_STR);
            $statement->bindParam(3, $password, PDO::PARAM_STR);
            $statement->execute();
            return true;
        } catch (Exception $exception) {
            throw new Exception("Failed to create admin user.", 0, $exception);
        }
    }
}

?>