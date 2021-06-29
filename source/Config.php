<?php

    define("SITE",[
    "name"=>"Matics² | ",
    "desc"=>"desc qualquer",
    "domain"=>"",
    "locale"=>"pt_BR",
    "root"=>"http://187.54.90.68:888/matics2/",

    ]);

    define("DATA_LAYER_CONFIG", [
        "driver" => "mysql",
        "host" => "localhost",
        "port" => "3306",
        "dbname" => "matics2",
        "username" => "root",
        "passwd" => "Banana123432",
        "options" => [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        ]
    ]);




    
    
  //  if($_SERVER["SERVER_NAME"] == "localhost"){
      //  require __DIR__."/Minify.php";
    //}

    