<?php
require_once 'AttackPokemon.php';
/**
 * Classe représentant un Pokémon.
 */
class Pokemon
{
    private string $name;
    /**
     * @var string $url L'URL de l'image du Pokémon.
     * @var int $hp Les points de vie du Pokémon (Health points).
     */
    private string $url;
    private int $hp;
    private AttackPokemon $attackPokemon;

    public function __construct(string $name, string $url, int $hp, AttackPokemon $attackPokemon)
    {
        $this->name = $name;
        $this->url = $url;
        $this->hp = $hp;
        $this->attackPokemon = $attackPokemon;
    }



    public function getName(): string
    {
        return $this->name;
    }

    public function getHp(): int
    {
        return $this->hp;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getAttackPokemon(): AttackPokemon
    {
        return $this->attackPokemon;
    }



    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setHp(int $hp): void
    {
        $this->hp = $hp;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function setAttackPokemon(AttackPokemon $attackPokemon): void
    {
        $this->attackPokemon = $attackPokemon;
    }

    public function isDead(): bool
    {
        return $this->hp <= 0;
    }

    /**
     * Attaque un autre Pokémon.
     *
     * @param Pokemon $target Le Pokémon cible.
     * @param int $coeifficient Coefficient d'attaque selon le type de pokemon(par défaut 1).
     */

    public function attack(Pokemon $target, int $coeifficient=1): void
    {
        $minAttack=$this->attackPokemon->getAttackMinimal();
        $maxAttack=$this->attackPokemon->getAttackMaximal();
        $specialAttack=$this->attackPokemon->getSpecialAttack();
        $probabilitySpecialAttack=$this->attackPokemon->getProbabilitySpecialAttack();
        
        $attack = rand($minAttack, $maxAttack)*$coeifficient;
        if (rand(1, 100) <= $probabilitySpecialAttack) {
            $attack *= $specialAttack;
        }

        if ($target->getHp()<=$attack){
            $target->setHp(0);
        }else{
            $target->setHp($target->getHp() - $attack);
        }
    }

    public function whoAmI()
    {
        echo "Nom : {$this->name}<br>";
        echo "<img src=\"{$this->url}\" alt=\"{$this->name}\" style=\"max-width: 200px; height: auto;\"><br>"; // Affichage de l'image   
        echo "Les points de vie : {$this->hp}<br>";
        echo "Attaque minimale : {$this->attackPokemon->getAttackMinimal()}<br>";
        echo "Attaque maximale : {$this->attackPokemon->getAttackMaximal()}<br>";
        echo "Coefficient attaque spéciale : {$this->attackPokemon->getSpecialAttack()}<br>";
        echo "Probabilité attaque spéciale : {$this->attackPokemon->getProbabilitySpecialAttack()}%<br>";
        echo "\n";
    }
}