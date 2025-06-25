<?php
// Sistema de Precios de Entrada
extract($_REQUEST);

// Verificar si se han enviado todos los datos requeridos
if (isset($nombre) && isset($apellido) && isset($edad) && is_numeric($edad)) {
    $precio_base = 2000; // Precio general
    $descuento_porcentaje = 0;
    $categoria = "";
    $mensaje_descuento = "";
    
    // Calcular descuento según la edad
    if ($edad < 20) {
        $descuento_porcentaje = 10;
        $categoria = "Menor de 20 años";
        $color = "#4ECDC4"; // Azul turquesa
        $mensaje_descuento = "¡Descuento juvenil!";
    } elseif ($edad >= 20 && $edad < 30) {
        $descuento_porcentaje = 7;
        $categoria = "20-29 años";
        $color = "#45B7D1"; // Azul
        $mensaje_descuento = "¡Descuento joven adulto!";
    } elseif ($edad >= 30 && $edad < 40) {
        $descuento_porcentaje = 5;
        $categoria = "30-39 años";
        $color = "#96CEB4"; // Verde
        $mensaje_descuento = "¡Descuento adulto!";
    } elseif ($edad >= 40 && $edad < 60) {
        $descuento_porcentaje = 0;
        $categoria = "40-59 años";
        $color = "#FECA57"; // Amarillo
        $mensaje_descuento = "Precio regular";
    } else { // 60 en adelante
        $descuento_porcentaje = 0;
        $categoria = "60+ años";
        $color = "#A29BFE"; // Púrpura
        $mensaje_descuento = "Precio regular";
    }
    
    // Calcular precio final
    $descuento_monto = ($precio_base * $descuento_porcentaje) / 100;
    $precio_final = $precio_base - $descuento_monto;
    
    // Mensaje personalizado
    if ($descuento_porcentaje > 0) {
        $mensaje = "¡Felicidades " . $nombre . "! Tu entrada cuesta $" . number_format($precio_final, 0, ',', '.') . " (ahorraste $" . number_format($descuento_monto, 0, ',', '.') . ")";
    } else {
        $mensaje = "Hola " . $nombre . ", tu entrada cuesta $" . number_format($precio_final, 0, ',', '.');
    }
    
} else {
    // Redirigir si no hay datos válidos
    header("Location: ejercicio2.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Resultado - Sistema de Precios</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <style>
        .result-container {
            background: rgba(57, 62, 70, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            box-shadow: 
                0 15px 35px rgba(0, 0, 0, 0.3),
                0 5px 15px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(148, 137, 121, 0.2);
            animation: fadeInUp 0.8s ease-out;
        }
        
        .customer-info {
            background: rgba(34, 40, 49, 0.6);
            border-radius: 15px;
            padding: 25px;
            margin: 20px 0;
            border: 1px solid rgba(148, 137, 121, 0.2);
        }
        
        .customer-name {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: var(--color-light);
        }
        
        .age-display {
            font-size: 2.5rem;
            font-weight: bold;
            margin: 15px 0;
            color: <?php echo $color; ?>;
            text-shadow: 0 0 20px <?php echo $color; ?>40;
        }
        
        .category {
            font-size: 1.2rem;
            margin: 10px 0;
            color: var(--color-accent);
            font-weight: 500;
        }
        
        .price-section {
            background: rgba(148, 137, 121, 0.1);
            border-radius: 15px;
            padding: 25px;
            margin: 25px 0;
            border: 2px solid rgba(148, 137, 121, 0.3);
        }
        
        .price-original {
            font-size: 1.2rem;
            color: var(--color-light);
            opacity: 0.7;
            margin-bottom: 10px;
        }
        
        .price-original.crossed {
            text-decoration: line-through;
            color: #ff6b6b;
        }
        
        .discount-info-result {
            font-size: 1.3rem;
            color: #4ECDC4;
            font-weight: bold;
            margin: 10px 0;
        }
        
        .price-final {
            font-size: 3rem;
            font-weight: bold;
            color: #4ECDC4;
            text-shadow: 0 0 20px #4ECDC440;
            margin: 15px 0;
        }
        
        .message {
            font-size: 1.3rem;
            margin: 25px 0;
            color: var(--color-light);
            font-weight: 500;
            line-height: 1.4;
            background: rgba(34, 40, 49, 0.6);
            border-radius: 12px;
            padding: 20px;
        }
        
        .back-btn {
            display: inline-block;
            margin-top: 30px;
            padding: 12px 30px;
            background: linear-gradient(135deg, var(--color-accent) 0%, #a69588 100%);
            color: var(--color-primary);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(148, 137, 121, 0.3);
        }
        
        .back-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(148, 137, 121, 0.4);
        }
        
        .color-indicator {
            width: 80px;
            height: 80px;
            background-color: <?php echo $color; ?>;
            border-radius: 50%;
            margin: 15px auto;
            box-shadow: 
                0 0 30px <?php echo $color; ?>60,
                0 8px 20px rgba(0, 0, 0, 0.3);
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .savings {
            color: #4ECDC4;
            font-weight: bold;
            font-size: 1.1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="result-container">
            <h2>🎫 Resultado del Precio</h2>
            
            <div class="customer-info">
                <div class="customer-name"><?php echo $nombre . " " . $apellido; ?></div>
                <div class="age-display"><?php echo $edad; ?> años</div>
                <div class="color-indicator"></div>
                <div class="category"><?php echo $categoria; ?></div>
            </div>
            
            <div class="price-section">
                <div class="price-original <?php echo ($descuento_porcentaje > 0) ? 'crossed' : ''; ?>">
                    Precio general: $<?php echo number_format($precio_base, 0, ',', '.'); ?>
                </div>
                
                <?php if ($descuento_porcentaje > 0): ?>
                    <div class="discount-info-result">
                        <?php echo $descuento_porcentaje; ?>% de descuento - <?php echo $mensaje_descuento; ?>
                    </div>
                    <div class="savings">
                        Ahorras: $<?php echo number_format($descuento_monto, 0, ',', '.'); ?>
                    </div>
                <?php else: ?>
                    <div class="discount-info-result">
                        <?php echo $mensaje_descuento; ?>
                    </div>
                <?php endif; ?>
                
                <div class="price-final">
                    $<?php echo number_format($precio_final, 0, ',', '.'); ?>
                </div>
            </div>
            
            <div class="message">
                <?php echo $mensaje; ?>
            </div>
            
            <a href="ejercicio2.html" class="back-btn">Calcular otro precio</a>
        </div>
    </div>
</body>
</html>