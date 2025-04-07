<?php
require_once 'Pokemon.php';
class PokemonPlante extends Pokemon{
    public function __construct(string $name, string $url, int $hp, AttackPokemon $attackPokemon) {
        parent::__construct($name, $url, $hp, $attackPokemon);
    }
    
    public function attack(Pokemon $target){
        if ($target instanceof PokemonEau) {
            $this->attack($target,2);
        } elseif ($target instanceof PokemonPlante || $target instanceof PokemonFeu) {
            $this->attack($target,0.5);
        }else {
            $this->attack($target,1);
        }
    }
}
