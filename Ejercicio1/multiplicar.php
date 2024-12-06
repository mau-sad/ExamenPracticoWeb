<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Tabla de Multiplicar</title>
</head>
<body>
    <h1>Generar Tabla de Multiplicar</h1>
    <form method="POST">
        <label for="numero">Ingresa un número:</label>
        <input type="number" id="numero" name="numero" required>
        <button type="submit">Generar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST['numero'];

        if ($numero > 0) {
            echo "<h2>Tabla de multiplicar del $numero:</h2>";
            echo "<table border='1' cellpadding='10' cellspacing='0'>";

            echo "<tr>
                    <th>Multiplicador</th>
                    <th>Resultado</th>
                  </tr>";

            for ($i = 1; $i <= 12; $i++) {
                $resultado = $numero * $i;
                echo "<tr>
                        <td>$numero x $i</td>
                        <td>$resultado</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='color:red;'>Por favor, ingresa un número mayor que 0.</p>";
        }
    }
    ?>
</body>
</html>

