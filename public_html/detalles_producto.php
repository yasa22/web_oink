<?php
require_once dirname(__DIR__) . '/includes/config.php';
require_once RAIZ_APP . "/includes/producto.php";
require_once RAIZ_APP. '/includes/Usuario.php';
require_once RAIZ_APP . '/includes/Valoracion.php';

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
            <div id='producto'>
                <div id="imagen_producto">
                    <img src='$ruta' alt='Imagen del producto'>
                </div>
                <div id="info_producto">
                    <h1>$nombre</h1>
                    <p>$descripcion</p>
                    <h3>Tallas Disponibles</h3>
                    <div id='tallas'>
                        <p> S · M · L · XL · XXL </p>
                    </div>
                    <div id='precio'>
                        <h3>Precio</h3>
                        <p>{$producto->getPrecio()}€</p>
                    </div>
                </div>
            </div>
            <div id='valoraciones_producto'>
                <h4>Valoraciones</h4>
EOS;

// Simulación de obtener valoraciones
$id_producto = $producto->getID();
//$valoraciones = Valoracion::getValoracion($id_producto);

$valoracion = null;

//foreach ($valoraciones as $valoracion) {
    if ($valoracion != null) {
        $usuario = Usuario::buscaPorId($valoracion["Idusuario"]);
        $usuarioNombre = $usuario->getNombre();
        $contenido .= "<div class='valoracion'>";
        $contenido .= "<p><strong>Usuario:</strong> $usuarioNombre</p>";
        $contenido .= "<p><strong>Valoración:</strong> {$valoracion["Valoracion"]}</p>";
        $contenido .= "<p><strong>Comentario:</strong> {$valoracion["Comentario"]}</p>";
        $contenido .= "</div>";
    }
    else {
        $contenido .= "<p>No hay valoraciones en este producto</p>";
    }
//}

$contenido .= <<<EOS
            </div>
        </div>
    </section>
</article>
EOS;

require_once RAIZ_APP . '/includes/template.php';
