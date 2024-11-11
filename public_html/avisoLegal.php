<?php
require_once dirname(__DIR__) . '/includes/config.php';

$titulo = 'Aviso Legal OINK!';
$contenido = <<<EOS
        <article>
            <section>
                <h1>Aviso Legal</h1>       
            </section>
        </article>
    EOS;
    require_once RAIZ_APP . '/includes/template.php';