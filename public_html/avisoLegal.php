<?php
require_once dirname(__DIR__) . '/includes/config.php';

$titulo = 'Aviso Legal OINK!';
$contenido = <<<EOS
        <article>
            <section>
                <div id='avisoLegal'>
                    <h1>Aviso Legal</h1>
                    <p>
                        Oink!® es una marca registrada en la Oficina Española de Patentes y Marcas (OEPM), protegida por las leyes de propiedad intelectual aplicables.
                    </p>
                    <p>
                        <strong>Tipo de Marca: </strong> La marca Oink! es una marca individual, verbal y denominativa registrada bajo la clasificación de Niza 25.
                    </p>
                        <strong>Derechos de Propiedad Intelectual: </strong> La marca Oink! está protegida por las leyes de propiedad intelectual. Cualquier uso no autorizado de la marca Oink! 
                        sin permiso expreso está estrictamente prohibido y puede resultar en acciones legales.
                    </p>
                    <p>
                        <strong>Uso No Autorizado: </strong> Queda estrictamente prohibido el uso de la marca Oink! para identificar productos o servicios no autorizados. Cualquier uso no 
                        autorizado, incluyendo la reproducción, imitación, modificación o explotación comercial de la marca Oink! será perseguido legalmente.
                    </p>
                    <p>
                        <strong>Responsabilidad Legal: </strong> No nos hacemos responsables de los daños o perjuicios que puedan derivarse del uso indebido de la marca Oink! por parte de 
                        terceros no autorizados.
                    </p>
                    <p>
                        <strong>Actualización del Aviso: </strong> Este aviso legal puede ser actualizado periódicamente.
                    </p>
                </div>   
            </section>
        </article>
    EOS;
    require_once RAIZ_APP . '/includes/template.php';