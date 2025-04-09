<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon Battle</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="pokemon-container">
    <?php
    require_once __DIR__ . '/classes/Pokemon.php';
    require_once __DIR__ . '/combat.php';

    $attack1 = new AttackPokemon(10, 20, 2, 40);
    $pikachu = new Pokemon("Pikachu", "https://archives.bulbagarden.net/media/upload/thumb/4/4a/0025Pikachu.png/900px-0025Pikachu.png", 100, $attack1);

    $attack2 = new AttackPokemon(5, 15, 3, 20);
    $bulbasaur = new Pokemon("Bulbasaur", "https://archives.bulbagarden.net/media/upload/f/fb/0001Bulbasaur.png", 100, $attack2);

    $pikachu->whoAmI();
    $bulbasaur->whoAmI();
    ?>

    </div>
    <div class="alert alert-primary" role="alert">
        Le combat commence !
    </div>
    <?php
    combat($pikachu, $bulbasaur);
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>