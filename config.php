<?php

class config{
private static $pdo=NULL;
public static function getConnexion(){

    if(!isset(self::$pdo)){
        try{
            self::$pdo = new PDO("mysql:host=localhost;dbname=eya",'root','',
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            

        ]);
        }catch(Exception $e){
            die("Could not connect to dba".$e->getMessage());

        }}
        return self::$pdo;
    }
        }

        
?>