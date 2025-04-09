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
    <h1>Les combattants</h1>
    <div class="pokemon-container">
    <?php
    require_once __DIR__ . '/classes/Pokemon.php';
    require_once __DIR__ . '/classes/PokemonPlante.php';
    require_once __DIR__ . '/classes/PokemonEau.php';
    require_once __DIR__ . '/classes/PokemonFeu.php';
    require_once __DIR__ . '/combat.php';

    $attack1 = new AttackPokemon(10, 20, 2, 40);
    $pikachu = new Pokemon("Pikachu", "https://archives.bulbagarden.net/media/upload/thumb/4/4a/0025Pikachu.png/900px-0025Pikachu.png", 100, $attack1);

    $attack2 = new AttackPokemon(5, 15, 3, 20);
    $bulbasaur = new PokemonPlante("Bulbasaur", "https://archives.bulbagarden.net/media/upload/f/fb/0001Bulbasaur.png", 120, $attack2);

    $attack3 = new AttackPokemon(10, 25, 2, 30);
    $squirtle = new PokemonEau("Squirtle", "https://archives.bulbagarden.net/media/upload/thumb/5/54/0007Squirtle.png/1024px-0007Squirtle.png",80, $attack3);

    $attack4 = new AttackPokemon(8, 25, 4, 15);
    $Charmander = new PokemonFeu("Charmander", "https://archives.bulbagarden.net/media/upload/thumb/2/27/0004Charmander.png/375px-0004Charmander.png", 90, $attack4);

    $pikachu->whoAmI();
    $bulbasaur->whoAmI();
    $squirtle->whoAmI();
    $Charmander->whoAmI();

    $ListPokemon = [
        1 => $pikachu,
        2 => $squirtle,
        3 => $bulbasaur,
        4 => $Charmander
    ];

    $HPinitial = [];
        foreach ($ListPokemon as $id => $pokemon) {
            $HPinitial[$id] = $pokemon->getHp();
        }
    ?>
    </div>
    <div class="selection">
        <p class='selection-label'>Choisissez vos Pokémon</p>
        <form method="POST" action="">
            <div class="selection-container">
                <select name="pokemon1" class="form-select" aria-label="Select Pokémon 1">
                    <option value="" selected>Choisissez Pokémon 1</option>
                    <option value="1">Normal: Pikachu</option>
                    <option value="2">Eau: Squirtle</option>
                    <option value="3">Plante: Bulbasaur</option>
                    <option value="4">Feu: Charmander</option>
                </select>
                <select name="pokemon2" class="form-select" aria-label="Select Pokémon 2">
                    <option value="" selected>Choisissez Pokémon 2</option>
                    <option value="1">Normal: Pikachu</option>
                    <option value="2">Eau: Squirtle</option>
                    <option value="3">Plante: Bulbasaur</option>
                    <option value="4">Feu: Charmander</option>
                </select>
            </div>
            <button type="submit" name="action" value="fight" class="btn btn-primary">Lancer le combat</button>
            <button type="submit" name="action" value="reset" class="btn btn-secondary">Reinitialiser</button>
        </form>
    </div>
    
    <?php
    $reset= false;
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action === 'reset') {
            foreach ($ListPokemon as $id => $pokemon) {
                $pokemon->setHP($HPinitial[$id]);
            }
            $reset = true;
        }elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pokemon1']) && isset($_POST['pokemon2'])) {
            $pokemon1Id = (int)$_POST['pokemon1'];
            $pokemon2Id = (int)$_POST['pokemon2'];

            if ($pokemon1Id === $pokemon2Id) {
                echo "<div class='alert alert-warning' role='alert'>Veuillez choisir deux Pokémon différents !</div>";
            } elseif (isset($ListPokemon[$pokemon1Id]) && isset($ListPokemon[$pokemon2Id])) {
                $selectedPokemon1 = $ListPokemon[$pokemon1Id];
                $selectedPokemon2 = $ListPokemon[$pokemon2Id];

                echo"<div class='alert alert-primary' role='alert'>Le combat commence !</div>";
                combat($selectedPokemon1, $selectedPokemon2);
                $selectedPokemon1->setHp($HPinitial[$pokemon1Id]);
                $selectedPokemon2->setHp($HPinitial[$pokemon2Id]);
            }

        } else {
            echo "<div class='alert alert-danger' role='alert'>Sélection invalide. Veuillez choisir deux Pokémon valides.</div>";
        }    
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>