<?php
include_once "Connection.php";

class Students{
    static private $bdd;
    
    private function __construct(){
    }

    static function getBdd() {
        if (!self::$bdd) {
            self::$bdd = Connection::getInstance();
        }
        return self::$bdd;
    }

    static function addStudent($name, $birthday, $imageName, $section){
        $req = self::getBdd()->prepare('SELECT COUNT(*) FROM section WHERE id = ?');
        $req->execute(array($section));
        $sectionExists = $req->fetchColumn();

        if ($sectionExists == 0) {
            throw new Exception("Section does not exist.");
        }

        $req = self::getBdd()->prepare('INSERT INTO etudiant (name, birthday, image, section) VALUES (?, ?, ?, ?)');
        $response = $req->execute(array($name, $birthday, $imageName, $section));

        return $response;
    }

    static function getStudent($id){
        $req = self::getBdd()->prepare('SELECT * FROM etudiant WHERE id=?');
        $req->execute(array($id));
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    static function getStudentBySection($section){
        $req = self::getBdd()->prepare('SELECT * FROM etudiant WHERE section=?');
        $req->execute(array($section));
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    static function getAll(){
        $req = self::getBdd()->query('SELECT * FROM etudiant');
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    static function deleteStudent($id){
        $req = self::getBdd()->prepare('DELETE FROM etudiant WHERE id=?');
        $response = $req->execute(array($id));
        
        // Reset auto-increment to the lowest available ID
        self::getBdd()->query('ALTER TABLE etudiant AUTO_INCREMENT = 1');
        
        return $response;
    }
    static function updateStudentImage($id, $imageName){
        $req = self::getBdd()->prepare('UPDATE etudiant SET image=? WHERE id=?');
        $response = $req->execute(array($imageName, $id));
        return $response;
    }

    static function updateStudentSection($id, $section){
        $req = self::getBdd()->prepare('UPDATE etudiant SET section=? WHERE id=?');
        $response = $req->execute(array($section, $id));
        return $response;
    }

    static function getStudentsByNameFilter($filter){
        $req = self::getBdd()->prepare('SELECT * FROM etudiant WHERE name LIKE ?');
        $req->execute(array("%$filter%"));
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
