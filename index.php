
<?php
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST["nombre"] ?? "");
    $correo = trim($_POST["correo"] ?? "");

    if ($nombre === "") {
        $mensaje = "Por favor, escribe tu nombre.";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $mensaje = "Escribe un correo válido.";
    } else {
        $nombreSeguro = htmlspecialchars(
            $nombre,
            ENT_QUOTES,
            "UTF-8"
        );

        $mensaje = "¡Gracias por contactarnos, "
            . $nombreSeguro . "!";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Sitio Web PHP</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header class="encabezado">
        <h1>Mi Sitio Web</h1>
        <nav>
            <a href="#inicio">Inicio</a>
            <a href="#sobre">Sobre nosotros</a>
            <a href="#contacto">Contacto</a>
        </nav>
    </header>

    <main>
        <section id="inicio" class="bienvenida">
            <h2>¡Bienvenido a mi página web!</h2>
            <p>
                Este es mi primer sitio web desarrollado
                utilizando PHP, HTML y CSS.
            </p>
            <a href="#contacto" class="boton">Contáctanos</a>
        </section>

        <section id="sobre" class="informacion">
            <h2>Sobre nosotros</h2>
            <p>
                Estamos aprendiendo desarrollo web y creando
                nuestro primer proyecto con PHP.
            </p>
        </section>

        <section id="contacto" class="contacto">
            <h2>Formulario de contacto</h2>

            <form method="POST" action="#contacto">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre"
                    placeholder="Escribe tu nombre" required>

                <label for="correo">Correo electrónico:</label>
                <input type="email" id="correo" name="correo"
                    placeholder="ejemplo@correo.com" required>

                <button type="submit">Enviar información</button>
            </form>

            <?php if ($mensaje !== ""): ?>
                <p class="mensaje">
                    <?= htmlspecialchars($mensaje, ENT_QUOTES, "UTF-8") ?>
                </p>
            <?php endif; ?>
        </section>
    </main>

    <footer>
        <p>&copy; <?= date("Y") ?> Mi Sitio Web. Desarrollado con PHP.</p>
    </footer>

</body>
</html>
