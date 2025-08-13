<?php
// Crear un array asociativo para almacenar datos de estudiantes
// Cada estudiante debe tener: nombre, edad, carrera y un array de notas
// Calcular el promedio de cada estudiante
// Encontrar al estudiante con mejor promedio
// Mostrar un reporte completo

// Array de estudiantes
$estudiantes = [
    [
        'nombre' => 'Roman',
        'edad' => 20,
        'carrera' => 'Ingeniería',
        'notas' => [8, 9, 7]
    ],
    [
        'nombre' => 'Maria',
        'edad' => 22,
        'carrera' => 'Medicina',
        'notas' => [9, 9, 9]
    ],
];

// Calcular el promedio de cada estudiante
foreach ($estudiantes as $estudiante) {
    $promedio = array_sum($estudiante['notas']) / count($estudiante['notas']);
}

// Encontrar al estudiante con mejor promedio
$mejor_promedio = 0;
$estudiante_mejor_promedio = '';
foreach ($estudiantes as $estudiante) {
    $promedio = array_sum($estudiante['notas']) / count($estudiante['notas']);
    if ($promedio > $mejor_promedio) {
        $mejor_promedio = $promedio;
        $estudiante_mejor_promedio = $estudiante['nombre'];
    }
}
// Reporte completo
echo "<h2>Reporte de Estudiantes</h2>";

foreach ($estudiantes as $estudiante) {
    echo "Nombre: " . $estudiante['nombre'] . "<br>";
    echo "Edad: " . $estudiante['edad'] . "<br>";
    echo "Carrera: " . $estudiante['carrera'] . "<br>";
    echo "<br>";
}

echo "El estudiante con mejor promedio es " . $estudiante_mejor_promedio . " con un promedio de: " . $mejor_promedio . "<br>";

