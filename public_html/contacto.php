<?php
require_once dirname(__DIR__) . '/includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitizar los datos enviados
    $name = htmlspecialchars($_POST['name']);
    $apellidos = htmlspecialchars($_POST['apellidos']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    // Validar los datos
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Por favor, introduce un correo electrónico válido.";
    } else {
        // Configuración del correo
        $to = "oinkporkwear@gmail.com"; // Cambia por tu dirección de correo
        $subject = "Nuevo mensaje de contacto de $name $apellidos";
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8";

        $body = "Nombre: $name\n";
        $body .= "Apellidos: $apellidos\n";
        $body .= "Correo: $email\n\n";
        $body .= "Mensaje:\n$message";

        // Enviar el correo
        if (mail($to, $subject, $body, $headers)) {
            $success = "Tu mensaje ha sido enviado con éxito.";
        } else {
            $error = "Hubo un problema al enviar el mensaje. Por favor, inténtalo más tarde.";
        }
    }
}

$titulo = 'Contacto OINK!';
$contenido = <<<EOS
    <article>
        <section>
            <div id='contacto'>
                <h1>CONTACTO</h1>
                <h2>¿Quieres contactar con nosotros?</h2>
                <p>Si deseas contactar con nosotros no dudes en hacerlo, tanto como si tienes una sugerencia como si es una crítica. 
                Todo feedback es siempre agradecido.</p>
                
                <form action="" method="post">
                    <input type="text" id="name" name="name" placeholder="Nombre" required>
                    <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos" required>
                    <input type="email" id="email" name="email" placeholder="Correo electrónico" required>
                    <textarea id="message" name="message" rows="4" placeholder="Escribe tu mensaje aquí" required></textarea>
                    
                    <div class="button-group">
                        <input type="submit" value="Enviar">
                    </div>
                </form>
            </div> 
        </section>
    </article>
EOS;

require_once RAIZ_APP . '/includes/template.php';
