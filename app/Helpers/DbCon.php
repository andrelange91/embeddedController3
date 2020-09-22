<?php
namespace App\Helpers;

class DbCon{
    private $connection = null;

    public function getConnection() {
        if ($this->connection === null) {
            $host = '127.0.0.1';
            $username = 'db_user';
            $password = 'password';
            $database = 'weather_app';
            $dsn = 'mysql:dbname=' . $database . ';host=' . $host . ';port=3306;charset=utf8';
            try {
                $this->connection = new \PDO($dsn, $username, $password);
            } catch (\PDOException $e) {
                var_dump($e);
                die('Ingen forbindelse til databasen');
            }
        }
        return $this->connection;
    }

    public function runSetSql($sql)
    {
        $stmt = $this->getConnection()->query($sql);
        if($stmt->errorCode() != '00000'){
            die("du har en fejl i din runSetSql. Tjek følgende:<br>".$sql);
        } else {
            return true;  
        }
    }
    public function runGetSql($sql)
    {
        $stmt = $this->getConnection()->query($sql);
        if($stmt->errorCode() != '00000'){
            die("du har en fejl i din runGetSql. Tjek følgende:<br>".$sql);
        } else {
            return $stmt->fetchAll();  
        }
    }

}