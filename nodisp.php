<?php
// index.php

date_default_timezone_set('America/Argentina/Buenos_Aires');

$archivo = __DIR__ . "/registros.txt";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $registro = [
        "fecha" => date("Y-m-d H:i:s"),
        "nombre" => $_POST["nombre"] ?? "",
        "telefono" => $_POST["telefono"] ?? "",
        "email" => $_POST["email"] ?? ""
    ];

    $linea = json_encode($registro, JSON_UNESCAPED_UNICODE) . PHP_EOL;

    file_put_contents($archivo, $linea, FILE_APPEND | LOCK_EX);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cupón no disponible</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #c90000;
            color: white;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .box {
            background: white;
            color: #c90000;
            padding: 35px;
            border-radius: 18px;
            max-width: 420px;
            box-shadow: 0 10px 35px rgba(0,0,0,0.35);
        }

        h1 {
            margin: 0 0 15px;
            font-size: 32px;
        }

        p {
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>

<div class="box">
    <h1>Este cupón ya no está disponible</h1>
    <p>La promoción finalizó o el cupón ya fue utilizado.</p>
</div>

</body>
</html>
