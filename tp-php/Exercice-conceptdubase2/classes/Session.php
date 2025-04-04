<?php
class Session {
    // attributs
    private $id;

    // constructeur
    public function __construct($id) {
        $this->id = $id;
        if (session_status() === PHP_SESSION_NONE) { //verifier si la session n'est pas deja demarree
            session_start();
        }

        if (!isset($_SESSION['nbrevisites'])) { //creer nbrevisites une variable pour la sassion pour l'afficher apres
            $_SESSION['nbrevisites'] = 0;
        }
    }

    // methodes
    public function getNbreVisites() {
        return $_SESSION['nbrevisites'];
    }

    public function incrementer() {
        $_SESSION['nbrevisites']++;
    }

    public function reinitialiser() {
        $_SESSION['nbrevisites'] = 0;
    }
}
?>