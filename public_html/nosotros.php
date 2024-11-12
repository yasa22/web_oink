<?php
require_once dirname(__DIR__) . '/includes/config.php';

$ruta1 = RUTA_IMG . '/espaldas.jpg';
$ruta2 = RUTA_IMG . '/furgo2.jpg';
$ruta3 = RUTA_IMG . '/lanza.jpg';
$ruta4 = RUTA_IMG . '/noche.jpg';
$ruta5 = RUTA_IMG . '/topless.jpg';

$titulo = 'Nosotros OINK!';
$contenido = <<<EOS
        <article>
            <section>
                <div id='nosotros'>
                    <h1>NOSOTROS</h1>
                    <h2>Somos OINK! locos apasionados por los deportes de tabla</h2>
                    <div class='nos'>
                        <img src="$ruta1" alt="Nosotros OINK!">
                        <p>Algunos ya nos conocen, otros no tardarán en hacerlo. Los oink somos un grupo de amigos que compartimos una gran pasión, por eso, 
                        el tiempo nos ha llevado a convertirnos en una gran familia. Cada uno de nosotros tiene su historia, cada uno se dedica a cosas muy 
                        distintas o incluso a no hacer nada. Desde hace un tiempo los gorrinos hemos estado escondidos en nuestras madrigueras, pero ya iba 
                        llegando el momento de volver y demostrar quién manda en la playa.</p>
                    </div>
                    <div class='nos'>
                        <p>Antaño éramos unos chavales descerebrados que nos juntábamos por las playas para practicar unos deportes nuevos y extraños. Íbamos 
                        con armatostes de fibra más grandes que nosotros que nos hacían volar por encima del agua. Los meros mortales nos miraban celosos desde 
                        la orilla porque en condiciones radicales solo un oink sobrevive y, por encima de todo, disfruta de la tempestad. También nos dedicábamos 
                        a deportes de invierno, pioneros en snowboard surfeando todas las montañas que se nos pusieran por delante.</p>
                        <img src="$ruta2" alt="Nosotros OINK!">
                    </div>
                    <div class='nos'>
                        <img src="$ruta3" alt="Nosotros OINK!">
                        <p>Hoy en día, todos con un poco menos de pelo y unos cuantos hijos igual (o más) majaretas que nosotros, tenemos planeado reflotar 
                        la marca que una vez fue. Nuestra madriguera principal está en Madrid, nos hacemos llamar los oink porque más que personas normales 
                        que van de playeo, somos unos gorrinos que no pueden vivir sin el mar, la nieve y el viento (para nada porque de verdad somos guarros 
                        y nos hinchamos a gorrinitas).</p>
                    </div>
                    <div class='nos'>
                        <p>Es posible que durante nuestra existencia hayamos tenido alguna que otra baja del grupo, pero también hemos ido reclutando nuevos 
                        miembros que salen de debajo de piedras incluso más pinchudas que las de artevida. Siendo gorrinos de todas partes del mundo, no se nos 
                        escapa ningún spot y pese a ello, seguimos rondando la Península para cazar las mejores condiciones de viento y olas.</p>
                        <img src="$ruta4" alt="Nosotros OINK!">
                    </div>
                    <div class='nos'>
                        <img src="$ruta5" alt="Nosotros OINK!">
                        <p>Nuestro equipo está formado por clanes familiares de lo más variopinto, tanto que algunos hasta se atreven a practicar las artes 
                        prohibidas del kitesurf. Se les quiere igual, pero siempre les miraremos por encima del hombro a los herejes que dan de lado el windsurf. 
                        Otros más tímidos prefieren el «pajarillo» que aún no sabemos muy bien cómo se usa, pero nos reímos mucho con las caidas. Adoptamos a 
                        cualquier tipo de gorrino que le guste el mar y los deportes que conlleva, nuestra madriguera está abierta a todos.</p>
                    </div>
                    <h2>Vente con nosotros y disfruta del mar como un auténtico OINK!</h2>
                </div>
            </section>
        </article>
    EOS;
    require_once RAIZ_APP . '/includes/template.php';