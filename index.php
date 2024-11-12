<?php
require_once 'includes/config.php';
$ruta = RUTA_IMG . '/furgo cortada.jpg';
$ruta1 = RUTA_IMG . '/db/Lima solo.jpg';
$ruta2 = RUTA_IMG . '/db/Azul solo.jpg';
$ruta3 = RUTA_IMG . '/db/BN solo.jpg';
$ruta4 = RUTA_IMG . '/db/Rosa solo.jpg';
$titulo = 'Tienda Oink!';
$contenido = <<<EOS
        <article>
            <section>
                <div id='principal'>
                    <img src="$ruta" alt="Fondo Furgo" />
                    <h1>PORK WEAR</h1>
                    <p>En el pico de la ola desde 1982</p>
                </div>
                <div id='pincipal2'>
                    <h1>ARTÍCULOS DESTACADOS</h1>
                    <p>Visita la tienda para ver todas nuestras prendas!</p>
                    <div id='cuadricula'>
                        <img src="$ruta1" alt="Artículo 1" />
                        <img src="$ruta2" alt="Artículo 2" />
                        <img src="$ruta3" alt="Artículo 3" />
                        <img src="$ruta4" alt="Artículo 4" />
                    </div>
                </div>
            </section>
        </article>
    EOS;
    require_once RAIZ_APP . '/includes/template.php';