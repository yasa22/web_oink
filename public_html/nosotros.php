<?php
require_once dirname(__DIR__) . '/includes/config.php';

$titulo = 'Nosotros OINK!';
$contenido = <<<EOS
        <article>
            <section>
                <h1>NOSOTROS</h1>       
            </section>
        </article>
    EOS;
    require_once RAIZ_APP . '/includes/template.php';