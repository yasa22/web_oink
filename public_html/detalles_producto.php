<?php
require_once dirname(__DIR__) . '/includes/config.php';
require_once RAIZ_APP . "/includes/producto.php";
require_once RAIZ_APP. '/includes/Usuario.php';

$producto_id = $_GET['id'];
$producto = Producto::getProducto($producto_id);

$titulo  = "Detalles del producto";
$ruta = RUTA_IMG . '/db/' . $producto->getImagen();
$nombre = $producto->getNombre();
$descripcion = $producto->getDescripcion();
$contenido = <<<EOS
            <article>
                <section>
                    <div id='detalles_producto'>
                    <h1>$nombre</h1>
            EOS;
            $contenido .= "<img src='$ruta' alt='Imagen del producto'>";
                         $contenido .= "<div>";
                             $contenido .= "<p>$descripcion</p>";
                             $contenido .= "<h4>Valoraciones</h4>";
                            
                            $id_producto = $producto->getID();
                            /*$valoraciones = valoracion::getValoracion($id_producto);
                            foreach($valoraciones as $valoracion) {
                                
                                if($valoracion != null) {
                                    
                                    $usuario = Usuario::buscaPorId($valoracion["Idusuario"]);
                            
                            
                                 $contenido .= "<div class='valoracion'>";
                                     $contenido .= "<p>Usuario: <?php echo $usuario->getNombre(); ?></p>";
                                     $contenido .= '<p>Valoración: <?php echo $valoracion["Valoracion"]; ?></p>';
                                     $contenido .= '<p>Comentario: <?php echo $valoracion["Comentario"]; ?></p>';
                                 $contenido .= "</div>";
                                }
                            }
                                */
                         $contenido .= "</div>";
                     $contenido .= "</div>";
                 $contenido .= "</section>";
            $contenido .= " </article>";
            

require_once RAIZ_APP . '/includes/template.php';
