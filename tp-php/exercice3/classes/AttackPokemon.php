<?php

/**
 * Classe représentant les capacités d'attaque d'un Pokémon.
 */

class AttackPokemon{
    /**
     * @var int $attackMinimal La valeur minimale de l'attaque.
     * @var int $attackMaximal La valeur maximale de l'attaque.
     * @var int $specialAttack Le coefficient de l'attaque en cas d'attaque spéciale.
     * @var int $probabilitySpecialAttack La probabilité en pourcentage d'utiliser l'attaque spéciale.
     */
    private int $attackMinimal;
    private int $attackMaximal;
    private int $specialAttack;
    private int $probabilitySpecialAttack;

    
    public function __construct(int $attackMinimal, int $attackMaximal, int $specialAttack, int $probabilitySpecialAttack)
    {
        $this->attackMinimal = $attackMinimal;
        $this->attackMaximal = $attackMaximal;
        $this->specialAttack = $specialAttack;
        $this->probabilitySpecialAttack = $probabilitySpecialAttack;
    }

    public function getAttackMinimal(){return $this->attackMinimal;}
    public function getAttackMaximal(){return $this->attackMaximal;}
    public function getSpecialAttack(){return $this->specialAttack;}
    public function getProbabilitySpecialAttack(){return $this->probabilitySpecialAttack;}

    public function setAttackMinimal(int $attackMinimal){$this->attackMinimal = $attackMinimal;}
    public function setAttackMaximal(int $attackMaximal){$this->attackMaximal = $attackMaximal;}
    public function setSpecialAttack(int $specialAttack){$this->specialAttack = $specialAttack;}
    public function setProbabilitySpecialAttack(int $probabilitySpecialAttack){$this->probabilitySpecialAttack = $probabilitySpecialAttack;}

}