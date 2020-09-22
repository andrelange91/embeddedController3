<?php
namespace App\Helpers;

class DbCon{
    // public function connectToDb()
    // {
    //     $host     = "localhost";
    //     $username = "db_user@localhost";
    //     $password = "password";
    //     $database = "weather_app";

        
    //     $objCon = new mysqli($host, $username, $password, $database);
        
    //     if($objCon->connect_errno){
    //         die('Der er ingen forbindelse til DB '. $objCon->error);
    //     } else {
    //         $objCon->set_charset('UTF8');
    //         return $objCon;
    //     }
    // }
    private $connection = null;

    public function getConnection() {
        if ($this->connection === null) {
            $host = 'localhost';
            $username = 'db_user';
            $password = 'password';
            $database = 'weather_app';
            $dsn = "mysql:host=$host;dbname=$database";
            try {
                $this->connection = new PDO($dsn, $username, $password);
            } catch (\PDOException $e) {
                var_dump($e);
                die('Ingen forbindelse til databasen');
            }
        }
        return $this->connection;
    }

    public function runSetSql($sql)
    {
        // $dbCon = connectToDb();
        $connection = $this->db->getConnection();
        $connection->query($sql);
        if($connection->error){
            die("du har en fejl i din runSetSql. Tjek følgende:<br>".$sql);
        }
        else{
            return true;
        }
    }
    public function runGetSql($sql)
    {
        $data = array();
        // $dbCon = connectToDb();
        $connection = $this->db->getConnection();
        $connection->query($sql);
        if($connection->error){
            die("du har en fejl i din runGetSql. Tjek følgende:<br>".$sql);
        }
        else{
            while ($row = $connection->fetch_array(MYSQLI_BOTH)) {
            $data[] = $row;
            }
            return $data;  
        }
    }

}