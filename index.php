<?php
require_once 'includes/config.php';

$titulo = 'Tienda Oink!';
$contenido = <<<EOS
        <article>
            <section>
                <h1>PAGINA PRINCIPAL</h1>   
            </section>
        </article>
    EOS;
    require_once RAIZ_APP . '/includes/template.php';