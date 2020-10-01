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
        $sql = "SELECT Temperature FROM daily_recordings WHERE DATE(RegisterTime) = CURRENT_DATE() ORDER BY Temperature DESC LIMIT 1"; // call db..
        return $this->db->runGetSql($sql);
    }

    public function GetLowest(){
        $sql = "SELECT Temperature FROM daily_recordings WHERE DATE(RegisterTime) = CURRENT_DATE() ORDER BY Temperature ASC LIMIT 1"; // call db..
        return $this->db->runGetSql($sql);
    }

    public function InsertTemp($RegisterTime, $Temperature, $Location){
        $sql = "INSERT INTO daily_recordings (RegisterTime, Temperature, Location) VALUES ($RegisterTime, $Temperature, $Location)";
        return $this->db->runSetSql($sql);
    }
}