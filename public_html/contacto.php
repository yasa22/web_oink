<?php
require_once dirname(__DIR__) . '/includes/config.php';

$titulo = 'Contacto OINK!';
$contenido = <<<EOS
    <article>
        <section>
            <div id='contacto'>
                <h1>CONTACTO</h1>
                <h2>¿Quieres contactar con nosotros?</h2>
                <p>Si deseas contactar con nosotros no dudes en hacerlo, tanto como si tienes una sugerencia como si es una crítica. 
                Todo feedback es siempre agradecido.</p>
                
                <form action="mailto:oinkporkwear@gmail.com" method="post" enctype="text/plain">
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
