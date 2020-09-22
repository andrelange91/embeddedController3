<?php
namespace App\Helpers;

class DbCon{
    function connectToDb()
    {
        $host     = "localhost";
        $username = "db_user@localhost";
        $password = "password";
        $database = "weather_app";

        
        $objCon = new mysqli($host, $username, $password, $database);
        
        if($objCon->connect_errno){
            die('Der er ingen forbindelse til DB '. $objCon->error);
        } else {
            $objCon->set_charset('UTF8');
            return $objCon;
        }
    }

    function runSetSql($sql)
    {
        $dbCon = connectToDb();
        $dbCon->query($sql);
        if($dbCon->error){
            die("du har en fejl i din runSetSql. Tjek følgende:<br>".$sql);
        }
        else{
            return true;
        }
    }
    function runGetSql($sql)
    {
        $data = array();
        $dbCon = connectToDb();
        $rs = $dbCon->query($sql);
        if($dbCon->error){
            die("du har en fejl i din runGetSql. Tjek følgende:<br>".$sql);
        }
        else{
            while ($row = $rs->fetch_array(MYSQLI_BOTH)) {
            $data[] = $row;
            }
            return $data;  
        }
    }

}