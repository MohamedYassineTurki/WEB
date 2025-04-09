<?php

include_once "autoloader.php";

class Student{
    static private $bd;

    private function __construct(){
    }

    static function getBd() {
        if (!self::$bd) {
            self::$bd = ConnexionDB::getInstance();
        }
        return self::$bd;
    }
    static function addStudent($id, $name, $birth_date){
        $req = self::getBd()->prepare('select * from student where id=?');
        $req->execute(array($id));
        if($req->fetch(PDO::FETCH_ASSOC)==null)
        {
            $req = self::getBd()->prepare('insert into students (id, nom, birth_date) values(?,?,?)');
            $req->execute(array($id, $name, $birth_date));
        }
    }

}
?>