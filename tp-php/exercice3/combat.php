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
    $round=1;
    while (!$a->isDead() && !$b->isDead()) {
        $a->attack($b);
        if ($b->getHp() <= 0) {
            echo "<div class='alert alert-success' role='alert'>Le gagnant est {$a->getName()}<img src='{$a->getUrl()}' alt='{$a->getName()}'></div>";
            break;
        }
        $b->attack($a);
        if ($a->getHp() <= 0) {
            echo "<div class='alert alert-success' role='alert'>Le gagnant est {$b->getName()} <img src='{$b->getUrl()}' alt='{$b->getName()}'></div>";
            return;
        }
        resultat($round, $a, $b);
        $round++;
    }
}

function resultat(int $round ,Pokemon $a, Pokemon $b)
{
    echo "<div class='round-label'>ROUND $round";
    echo "<div class='round-results-container'>";
    echo "<p class='round-result'>{$a->getName()} :{$a->getHp()} HP</p>";
    echo "<p class='round-result'>{$b->getName()} :{$b->getHp()} HP</p>";
    echo "</div>";
    echo "</div>";
    echo "<div class='pokemon-container'>";
    $a->whoAmI();
    $b->whoAmI();
    echo "</div>";
}


?>