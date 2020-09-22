<?php 

namespace App\Helpers;

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
    private $db;

    public function __construct(DbCon $db) {
        $this->db = $db;
    }

    public function GetHighest(){
        $sql = "SELECT MAX(Temperature) FROM daily_recordings where cast(RegisterTime as Date) = cast(getdate() as Date)"; // call db..
        return $this->db->runGetSql($sql);
    }

    public function GetMedian(){        
        $sql = "SELECT MIN(Temperature) FROM daily_recordings where cast(RegisterTime as Date) = cast(getdate() as Date)"; // call db..
        return $this->db->runGetSql($sql);
    }

    public function GetLowest(){
        $sql = "SELECT MIN(Temperature) FROM daily_recordings where cast(RegisterTime as Date) = cast(getdate() as Date)"; // call db..
        return $this->db->runGetSql($sql);
    }
}