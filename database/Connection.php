<?php 
namespace Connections;

use PDO;
use \Users\User as User;

class Connection{
    private static $pdoInstance;
    private $DB_HOST;
    private $DB_NAME;
    private $DB_USER;
    private $DB_PASS;

    public function __construct(){
    }

    public static function getPDO($h,$n,$u,$p){
        if(!self::$pdoInstance) { 
            try {
                self::$pdoInstance=new PDO("mysql:host=$h;dbname=$n", $u, $p);
            }
            catch (PDOException $e) { 
                die("PDO CONNECTION ERROR: " . $e->getMessage() . "<br/>");
             }
        }
    }

    public static function createTable($name){
        return self::$pdoInstance->query(" create table if not exists $name(
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            email VARCHAR(50) UNIQUE
            );");
    }
        
    public static function selectAll(){
        return self::$pdoInstance->query("SELECT * FROM `users`");
    }

    public static function selectById($id){
        return self::$pdoInstance->query("SELECT * FROM `users` WHERE `id`=".$id);
    }

    public static function getUserById($id){
        return self::$pdoInstance->query("SELECT * FROM `users` WHERE `id`=".$id)->fetchObject('Users\User');
    }

    public static function  getAllUsers(){
            return self::$pdoInstance->query("SELECT * FROM `users`")->fetchAll(PDO::FETCH_CLASS, 'Users\User');
    }

    public static function addUser($post){

        $q="INSERT INTO users(firstname,lastname,email) values ('".
        $post['firstname']."','".$post['lastname']."','".$post['email']."');";
        try {
            self::$pdoInstance->query($q);
            $seedfile = fopen(__DIR__."/seeds/seed.sql", "a") or die("Unable to open file!");
            fwrite($seedfile,$q."\n\n");
            fclose($seedfile);
        }
        catch (PDOException $e) { 
            die("PDO CONNECTION ERROR: " . $e->getMessage() . "<br/>");
         }
    }
}