<?php 

namespace App\Helpers;

// connect to db
include_once 'dbcon.php';

// get data 
class DatabaseHelper
{
    public function Get(){
        $conHelper = new DbCon();
        
        $sql = ""; // call db..
        $run = $conHelper->runGetSql($sql);


        return $run;
        // function viewAddr(){
        //     $sql = "SELECT id, street, postal, city, country, cvr FROM ek_addr LIMIT 1";
        //     return runGetSql($sql);
        // }
    }
}