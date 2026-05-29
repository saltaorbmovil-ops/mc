<?php
// index.php - Formulario HTML5 que guarda datos en datos.csv
// Subilo a un hosting con PHP. Dale permiso de escritura a la carpeta si hace falta.

$archivo = __DIR__ . '/datos.csv';
$mensaje = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $codigo = trim($_POST['codigo'] ?? '');
    $comentario = trim($_POST['comentario'] ?? '');

    if ($nombre === '' || $telefono === '') {
        $error = 'Completá nombre y teléfono.';
    } else {
        $existe = file_exists($archivo);
        $fp = fopen($archivo, 'a');

        if ($fp) {
            if (!$existe) {
                fputcsv($fp, ['fecha', 'nombre', 'telefono', 'email', 'codigo', 'comentario'], ';');
            }

            fputcsv($fp, [
                date('Y-m-d H:i:s'),
                $nombre,
                $telefono,
                $email,
                $codigo,
                $comentario
            ], ';');

            fclose($fp);
            $mensaje = 'Datos guardados correctamente.';
        } else {
            $error = 'No se pudo guardar. Revisá permisos del hosting.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promoción Mc App</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #b90000, #f00000);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: #fff;
        }
        .card {
            width: 100%;
            max-width: 460px;
            background: #fff;
            color: #222;
            border-radius: 22px;
            padding: 28px;
            box-shadow: 0 20px 50px rgba(0,0,0,.35);
            border: 6px solid #ffc400;
        }
        .logo {
            width: 78px;
            height: 78px;
            margin: 0 auto 16px;
            background: #e60012;
            color: #ffc400;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            font-weight: 900;
        }
        h1 {
            text-align: center;
            margin: 0 0 8px;
            font-size: 28px;
            color: #d80000;
            text-transform: uppercase;
        }
        .sub {
            text-align: center;
            margin: 0 0 22px;
            font-size: 17px;
            font-weight: 700;
        }
        label {
            font-weight: 700;
            display: block;
            margin-bottom: 6px;
            color: #333;
        }
        input, textarea {
            width: 100%;
            padding: 13px 14px;
            border: 2px solid #ddd;
            border-radius: 12px;
            font-size: 16px;
            margin-bottom: 14px;
            outline: none;
        }
        input:focus, textarea:focus { border-color: #ffc400; }
        textarea { min-height: 90px; resize: vertical; }
        button {
            width: 100%;
            border: 0;
            border-radius: 14px;
            background: #ffc400;
            color: #b90000;
            padding: 15px;
            font-size: 18px;
            font-weight: 900;
            cursor: pointer;
            text-transform: uppercase;
        }
        button:hover { filter: brightness(.95); }
        .msg, .err {
            padding: 12px;
            border-radius: 12px;
            margin-bottom: 15px;
            text-align: center;
            font-weight: 700;
        }
        .msg { background: #e7ffe7; color: #0b7a0b; }
        .err { background: #ffe7e7; color: #b00000; }
        .footer {
            text-align: center;
            margin-top: 14px;
            font-size: 13px;
            color: #777;
        }
    </style>
</head>
<body>
    <main class="card">
        <div class="logo">M</div>
        <h1>Segundo gratis</h1>
        <p class="sub">Comprando uno vía app te llevás el segundo gratis</p>

        <?php if ($mensaje): ?>
            <div class="msg"><?= htmlspecialchars($mensaje) ?></div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="err"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="nombre">Nombre *</label>
            <input type="text" id="nombre" name="nombre" required placeholder="Tu nombre">

            <label for="telefono">Teléfono *</label>
            <input type="tel" id="telefono" name="telefono" required placeholder="Ej: 11 1234 5678">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="tu@email.com">

            <label for="codigo">Código / cupón</label>
            <input type="text" id="codigo" name="codigo" value="250564" placeholder="Código">

            <label for="comentario">Comentario</label>
            <textarea id="comentario" name="comentario" placeholder="Escribí algo si querés"></textarea>

            <button type="submit">Guardar datos</button>
        </form>

        <div class="footer">Los datos se guardan en datos.csv</div>
    </main>
</body>
</html>
