<?php
class ConnexionDB {
    private static $_dbname = "tp_php";
    private static $_host = "localhost";
    private static $_user = "root";
    private static $_password = "";
    private static $_bdd = null;

    private function __construct() {
        try {
            self::$_bdd = new PDO("mysql:host=" . self::$_host, self::$_user, self::$_password);
            self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$_bdd->exec("CREATE DATABASE IF NOT EXISTS `" . self::$_dbname . "` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            self::$_bdd = new PDO(
                "mysql:host=" . self::$_host . ";dbname=" . self::$_dbname . ";charset=utf8mb4",
                self::$_user,
                self::$_password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8')
            );
            self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::createTable();
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$_bdd == null) {
            new ConnexionDB();
        }
        return self::$_bdd;
    }

    private static function createTable() {
        $sql = "CREATE TABLE IF NOT EXISTS students (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR(50) NOT NULL,
            birth_date DATE NOT NULL
        )";
        self::$_bdd->exec($sql);
    }
}