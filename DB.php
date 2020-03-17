<?php
 class database{
     
    private static $dbName='reservationblock';
    private static $dbHost='localhost';
    private static $dbUsername='root';
    private static $dbPassword='';
    private static $cont=null;
    
  /*  private static $dbName='poitier';
    private static $dbHost='db4free.net';
    private static $dbUsername='omarillass';
    private static $dbPassword='123456789';
    private static $cont=null;*/

    public function __construct() { die('Init function is not allowed');}

    public static function connect(){ 
      
        self::$cont=new PDO("mysql:host=".self::$dbHost.";"."dbname=".self::$dbName,self::$dbUsername,self::$dbPassword);
        //self::$cont=new PDO('db4free.net;dbname=poitier;port=3306','omarillass','123456789');

       return self::$cont;
    }

    public static function disconnect(){self::$cont=null;}
}
?>