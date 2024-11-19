<?php
require_once dirname(__DIR__) . '/includes/config.php';

$titulo = 'Galería OINK!';
$contenido = <<<EOS
        <article>
            <section>
                <div id='galeria'>
                    <h1>GALERIA</h1>

                    <h2>Dibujitos de Iago Milet</h2>
                </div>     
            </section>
        </article>
    EOS;
    require_once RAIZ_APP . '/includes/template.php';