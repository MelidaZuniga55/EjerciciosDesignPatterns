<?php
/*

EJERCICIO 2 - PATRÓN ADAPTER
Objetivo:
Hacer que Windows 10 pueda abrir archivos antiguos de Windows 7.

Patrón aplicado:
Adapter → convierte la interfaz de una clase existente
en otra que el cliente espera.
*/

// Clase antigua 
class Windows7 {
    public function abrirArchivoAntiguo($nombre) {
        return "Abriendo archivo antiguo: $nombre (Windows 7)";
    }
}

// Interfaz que espera el cliente (Windows 10)
interface SistemaOperativo {
    public function abrirArchivo($nombre);
}

// Adaptador: traduce la interfaz antigua a la moderna
class Windows7Adapter implements SistemaOperativo {
    private $windows7;

    public function __construct(Windows7 $windows7) {
        $this->windows7 = $windows7;
    }

    // Se adapta el método antiguo al nuevo
    public function abrirArchivo($nombre) {
        return $this->windows7->abrirArchivoAntiguo($nombre);
    }
}

// Cliente que trabaja con la interfaz moderna
class Windows10 {
    private $sistema;

    public function __construct(SistemaOperativo $sistema) {
        $this->sistema = $sistema;
    }

    public function abrir($nombre) {
        echo $this->sistema->abrirArchivo($nombre) . "\n";
    }
}

// Ejemplo de uso
echo "=== DEMOSTRACIÓN ADAPTER PATTERN ===\n\n";

$win7 = new Windows7();                 
$adaptador = new Windows7Adapter($win7); 
$win10 = new Windows10($adaptador);

echo "Windows 10 abriendo archivos legacy:\n";
$win10->abrir("documento_word.doc");
$win10->abrir("hoja_excel.xls");
$win10->abrir("presentacion_ppt.ppt");

?>