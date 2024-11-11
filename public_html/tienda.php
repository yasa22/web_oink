<?php
require_once dirname(__DIR__) . '/includes/config.php';

$titulo = 'Tienda OINK!';
$contenido = <<<EOS
        <article>
            <section>
                <h1>TIENDA</h1>       
            </section>
        </article>
    EOS;
    require_once RAIZ_APP . '/includes/template.php';