<?php

include_once "autoloader.php";

class Student {
    private static $bdd;

    private function __construct() {
    }

    public static function getBd() {
        if (!self::$bdd) {
            self::$bdd = ConnexionDB::getInstance();
        }
        return self::$bdd;
    }

    public static function addStudent($name, $birth_date) {
        //Ading student only after checking if it exist's or not
        $sql = "SELECT COUNT(*) FROM students WHERE nom = :name AND birth_date = :birth_date";
        $stmt = self::getBd()->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':birth_date' => $birth_date
        ]);
        $count = $stmt->fetchColumn();
        if ($count == 0) {
            $sql = "INSERT INTO students (nom, birth_date) VALUES (:name, :birth_date)";
            $stmt = self::getBd()->prepare($sql);
            $stmt->execute([
                ':name' => $name,
                ':birth_date' => $birth_date
            ]);
        }
    }
}
?>
?>