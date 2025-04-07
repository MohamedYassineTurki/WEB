//TODO: Créer une page css pour le style de la page
<?php
require_once __DIR__ . '/classes/Pokemon.php';
require_once __DIR__ . '/combat.php';

$attack1 = new AttackPokemon(10, 20, 2, 40);
$pikachu = new Pokemon("Pikachu", "https://archives.bulbagarden.net/media/upload/thumb/4/4a/0025Pikachu.png/900px-0025Pikachu.png", 100, $attack1);

$attack2 = new AttackPokemon(5, 15, 3, 20);
$bulbasaur = new Pokemon("Bulbasaur", "https://archives.bulbagarden.net/media/upload/f/fb/0001Bulbasaur.png", 100, $attack2);

$pikachu->whoAmI();
$bulbasaur->whoAmI();

echo "Le combat commence !<br>";
echo "---------------------------------<br>";
combat($pikachu, $bulbasaur);
echo "---------------------------------<br>";
