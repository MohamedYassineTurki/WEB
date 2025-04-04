<?php

class Etudiant{
    //attributs
    private $nom;
    private $notes;

    //constructeur
    public function __construct($nom, $notes){
        $this->nom=$nom;
        $this->notes=$notes;
    }

    //methodes
    public function getnom(){
        return $this->nom;
    }
    public function getnotes(){
        return $this->notes;
    }

    public function affichernotes(){
        echo "Les notes de l'étudiant ".$this->nom." sont : ";
        echo "<br>";
        for($i=0; $i<count($this->notes); $i++){
            echo $this->notes[$i]." ";
            echo "<br>";
        }
    }

    public function calculermoyenne(){
        $somme=0;
        for($i=0; $i<count($this->notes); $i++){
            $somme+=$this->notes[$i];
        }
        return $somme/count($this->notes);
    }

    public function resultat(){
        $moyenne=$this->calculermoyenne();
        if($moyenne>=10){
            echo"admis";
        }else{
            echo "non admis";
        }
    }

}