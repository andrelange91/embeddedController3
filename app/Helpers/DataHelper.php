<?php 

namespace App\Helpers;
use App\Helpers\DbCon;

// connect to db
include_once 'dbcon.php';

// db info:
// db name: weather_app
// table name: daily_recordings
// coloums in table: 
    // RegisterTime (datetime)
    // Temperature (double)
    // Location (varchar(256))
// user (username and password):
        // db_user@localhost
        // password

// get data 
class DataHelper
{
    public function GetHighest(){
        $conHelper = new DbCon();
        
        $sql = "SELECT MAX(Temperature) FROM daily_recordings where cast(Temperature as Date) = cast(getdate() as Date)"; // call db..
        $run = $conHelper->runGetSql($sql);

        return $run;
    }

    public function GetMedian(){
        $conHelper = new DbCon();
        
        $sql = "SELECT MIN(Temperature) FROM daily_recordings where cast(Temperature as Date) = cast(getdate() as Date)"; // call db..
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