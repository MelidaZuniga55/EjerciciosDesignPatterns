<?php
/*

EJERCICIO 4 - PATRÓN STRATEGY
Objetivo:
Mostrar mensajes en distintos formatos: consola, JSON y TXT.

Patrón aplicado:
Strategy → permite definir varios algoritmos (formas de mostrar
el mensaje) e intercambiarlos dinámicamente.
*/

// Interfaz base para las estrategias
interface EstrategiaSalida {
    public function mostrar($mensaje);
}

// Estrategia 1: mostrar en consola
class Consola implements EstrategiaSalida {
    public function mostrar($mensaje) {
        echo "Mensaje en consola: $mensaje" . PHP_EOL;
    }
}

// Estrategia 2: mostrar en formato JSON
class JSONSalida implements EstrategiaSalida {
    public function mostrar($mensaje) {
        echo json_encode(["mensaje" => $mensaje], JSON_PRETTY_PRINT) . PHP_EOL;
    }
}

// Estrategia 3: guardar mensaje en un archivo TXT
class ArchivoTXT implements EstrategiaSalida {
    public function mostrar($mensaje) {
        file_put_contents("salida.txt", "Mensaje: $mensaje" . PHP_EOL, FILE_APPEND);
        echo "Mensaje guardado en salida.txt" . PHP_EOL;
    }
}

// Clase que usa las estrategias
class Mensajero {
    private $estrategia;

    public function __construct(EstrategiaSalida $estrategia) {
        $this->estrategia = $estrategia;
    }

    public function setEstrategia(EstrategiaSalida $estrategia) {
        $this->estrategia = $estrategia;
    }

    public function enviar($mensaje) {
        $this->estrategia->mostrar($mensaje);
    }
}

// Ejemplo de uso 
$mensaje = "Sistema funcionando correctamente";

$mensajero = new Mensajero(new Consola());
$mensajero->enviar($mensaje); 

$mensajero->setEstrategia(new JSONSalida());
$mensajero->enviar($mensaje); 

$mensajero->setEstrategia(new ArchivoTXT());
$mensajero->enviar($mensaje); 

?>