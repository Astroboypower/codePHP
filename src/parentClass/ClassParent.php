<?php

// Déclaration de l'espace de noms 'tests'
namespace tests;

// Déclaration de la classe 'classParent'
class classParent {
    // Déclaration d'une méthode statique 'square'
    // Les méthodes statiques peuvent être appelées sans instancier la classe
    public static function square($number) {
        return $number * $number;
    }

    // Déclaration d'une propriété publique 'prop'
    // Les propriétés publiques peuvent être accessibles de partout
    public $prop = 0;

    // Déclaration d'une méthode publique 'increment'
    // Les méthodes publiques peuvent être appelées de partout
    public function increment() {
        $this->prop++;
    }
}