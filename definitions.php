<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Helpers\DbCon;

return [
    FilesystemLoader::class => function (){
        return new FilesystemLoader(__DIR__ . "/views");
    },
    Environment::class => function(FilesystemLoader $loader){
        return new Environment($loader);
    },
    DbCon::class => function() { 
        return new DbCon();
    },
    DataHelper::class => function(DbCon $db) { 
        return new DataHelper($db); 
    },
];