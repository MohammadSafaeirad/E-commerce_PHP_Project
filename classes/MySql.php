<?php
declare(strict_types=1);

/*
 * PHP_Final_Project_Ecommerce MySql.php
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
class MySql{
    private string $servername = 'localhost';
    private string $db_username = 'root';
    private string $db_password = '';
    private string $db_name = 'online-shop';
    
    protected function connect() : PDO {
        $this->servername = 'localhost';
        $this->db_username = 'root';
        $this->db_password = '';
        $this->db_name = 'online_shop';
        
        $dsn = "mysql:host=$this->servername;dbname=$this->db_name;charset=utf8mb4";
        
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        
        try {
            $pdo = new PDO($dsn, $this->db_username, $this->db_password, $options);
            return $pdo;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}