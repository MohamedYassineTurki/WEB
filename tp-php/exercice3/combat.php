<?php
require_once __DIR__ . '/classes/Pokemon.php';
/**
 * Fonction pour simuler un combat entre deux Pokémon.
 * 
 * @param Pokemon $a Le premier Pokémon a attaquer.
 * @param Pokemon $b Le deuxième Pokémon.
 * 
 * @return void
 */
function combat(Pokemon $a, Pokemon $b)
{
    while (!($a->isDead()) && !($b->isDead())) {
        $a->attack($b);
        echo "{$b->getName()} a maintenant {$b->getHp()} HP.<br>";
        
        if ($b->getHp() <= 0) {
            echo "{$b->getName()} est KO !\nLe gagnant est {$a->getName()} !<br>";
            break;
        }
        
        $b->attack($a);
        echo "{$a->getName()} a maintenant {$a->getHp()} HP.<br>";
        
        if ($a->getHp() <= 0) {
            echo "{$a->getName()} est KO !\nLe gagnant est {$b->getName()} !<br>";
            break;
        }
    }
}