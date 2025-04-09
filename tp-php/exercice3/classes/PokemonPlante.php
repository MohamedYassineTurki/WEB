<?php
require_once 'Pokemon.php';
class PokemonPlante extends Pokemon{
    public function __construct(string $name, string $url, int $hp, AttackPokemon $attackPokemon) {
        parent::__construct($name, $url, $hp, $attackPokemon);
    }
    
    public function attack(Pokemon $target, int $coeifficient = 1):void
    {
        if ($target instanceof PokemonEau) {
            parent::attack($target,2);
        } elseif ($target instanceof PokemonPlante || $target instanceof PokemonFeu) {
            parent::attack($target,0.5);
        }else {
            parent::attack($target,1);
        }
    }
}
