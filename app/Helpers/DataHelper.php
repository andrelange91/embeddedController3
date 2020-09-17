<?php 

namespace App\Helpers;

// connect to db
include_once 'dbcon.php';

// get data 
class DataHelper
{
    public function GetHighest(){
        $conHelper = new DbCon();
        
        $sql = "SELECT MAX(tempvalue) FROM temps where cast(tempDate as Date) = cast(getdate() as Date)"; // call db..
        $run = $conHelper->runGetSql($sql);

        return $run;
    }

    public function GetMedian(){
        $conHelper = new DbCon();
        
        $sql = "SELECT MIN(tempvalue) FROM temps where cast(tempDate as Date) = cast(getdate() as Date)"; // call db..
        $run = $conHelper->runGetSql($sql);

        return $run;
    }

    public function GetLowest(){
        $conHelper = new DbCon();
        
        $sql = "SELECT MIN(tempvalue) FROM temps where cast(tempDate as Date) = cast(getdate() as Date)"; // call db..
        $run = $conHelper->runGetSql($sql);

        return $run;
    }
}