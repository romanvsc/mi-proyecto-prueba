<?php
// Ejercicio 1: Básico - Lista de ComprasDificultad: ⭐

//Crear un sistema simple para manejar una lista de compras.

//Tareas:

//Crear un array con 5 productos de supermercado
//Mostrar todos los productos numerados
//Agregar 2 productos más al array
//Mostrar el total de productos
//Verificar si "leche" está en la lista


$productos = array("leche", "huevo", "pan", "manzana", "banana");

echo "Productos en la lista: <br>";
// Productos en la lista
foreach ($productos as $producto) {
    echo $producto . "<br>";
}
// Agregar 2 productos más al array
$productos[] = "cebolla";
$productos[] = "tomate";

// Mostrar el total de productos
echo "Total de productos: " . count($productos) . "<br>";

//Verificar si "leche" está en la lista
if (in_array("leche", $productos)) {
    echo "La leche está en la lista <br>";
} else {
    echo "La leche no está en la lista <br>";
}
?>