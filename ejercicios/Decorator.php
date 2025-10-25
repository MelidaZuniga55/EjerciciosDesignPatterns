<?php
/*

EJERCICIO 3 - PATRÓN DECORATOR
Objetivo:
Añadir armas o habilidades adicionales a personajes sin
modificar su clase base.

Patrón aplicado:
Decorator → permite añadir responsabilidades extra a
un objeto de forma dinámica.
*/

// Interfaz base (personajes)
interface Heroe {
    public function descripcion();
}

// Clases concretas base
class Guerrero implements Heroe {
    public function descripcion() {
        return "Guerrero valiente ";

    }
}

class Hechicera implements Heroe {
    public function descripcion() {
        return "Hechicera poderosa";

    }
}

// Clase decoradora base
class ArmaDecorator implements Heroe {
    protected $heroe;

    public function __construct(Heroe $heroe) {
        $this->heroe = $heroe;
    }

    public function descripcion() {
        return $this->heroe->descripcion();
    }
}

// Decoradores concretos que agregan funciones extra
class Espada extends ArmaDecorator {
    public function descripcion() {
        return $this->heroe->descripcion() . "con una espada legendaria";
    }
}

class BastonMagico extends ArmaDecorator {
    public function descripcion() {
        return $this->heroe->descripcion() . " con un bastón mágico";
    }
}

// Ejemplo de uso
$guerrero = new Guerrero();
$hechicera = new Hechicera();

// Se agregan armas sin cambiar la clase original
$guerreroConEspada = new Espada($guerrero);
$hechiceraConBaston = new BastonMagico($hechicera);

echo $guerreroConEspada->descripcion() . PHP_EOL;
echo $hechiceraConBaston->descripcion() . PHP_EOL;

?>
