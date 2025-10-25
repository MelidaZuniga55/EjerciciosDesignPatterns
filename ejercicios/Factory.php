<?php
/*

EJERCICIO 1 - PATRÓN FACTORY 
Objetivo:
Crear personajes ("Esqueleto" o "Zombi") según el nivel del juego.

Patrón aplicado:
Factory → permite crear objetos sin especificar
directamente la clase que se va a instanciar.
*/

// Interfaz que define los métodos que todos los personajes deben implementar
interface Personaje {
    public function velocidad();
    public function ataque();
}

// Clase concreta: Esqueleto para nivel fácil
class Esqueleto implements Personaje {
    public function velocidad() {
        echo "El esqueleto corre rápido\n";
    }

    public function ataque() {
        echo "El esqueleto ataca con un hueso\n";
    }
}

// Clase concreta: Zombi para nivel difícil
class Zombie implements Personaje {
    public function velocidad() {
        echo "El zombi camina lentamente\n";
    }

    public function ataque() {
        echo "El zombi ataca con una bomba y un cuchillo\n";
    }
}

// Fábrica: crea personajes según el nivel de dificultad
class PersonajeFactory {
    public static function crearPersonaje($nivel): Personaje {
        if ($nivel == "facil") {
            return new Esqueleto();
        } elseif ($nivel == "dificil") {
            return new Zombie();
        } else {
            throw new Exception("Escoge un grado de dificultad válido");
        }
    }
}

// Uso de la fábrica, demostración con ambos personajes
try {
    // Crear y mostrar personaje para nivel facil
    echo "NIVEL FÁCIL:\n";
    $personajeFacil = PersonajeFactory::crearPersonaje('facil');
    $personajeFacil->velocidad();
    $personajeFacil->ataque();
    
    echo "\n"; 
    
    // Crear y mostrar personaje para nivel dificil
    echo "NIVEL DIFÍCIL:\n";
    $personajeDificil = PersonajeFactory::crearPersonaje('dificil');
    $personajeDificil->velocidad();
    $personajeDificil->ataque();
    
} catch (Exception $e) {
    echo $e->getMessage();
}
?>