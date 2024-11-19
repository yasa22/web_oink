<?php

require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/includes/producto.php';

$productos = [];
$producto = new Producto(null, null, null, null, null);
$productos_data = $producto->getAllProductos();

foreach ($productos_data as $producto_data) {
    $producto = new Producto($producto_data['ID_Producto'], $producto_data['Nombre'], $producto_data['Descripcion'], $producto_data['Precio'], $producto_data['Imagen']);
    $productos[] = $producto;
}


$titulo = 'Tienda OINK!';
$contenido = <<<EOS
        <article>
            <section>
                <div id='tineda'>
                    <h1>TIENDA</h1>
        EOS;
                    if (!empty($productos)) {
                        
                        $contenido .= "<div id='divproductos'>";
                        foreach ($productos as $producto) {
                            
                                $class = "producto";
                                $contenido .= "<div class='$class' style='position: relative;'>";
                                    $contenido .= "<div class='imgProducto'>";
                                        $contenido .= "<a class='subr' href='detalles_producto.php?id=" . $producto->getID() . "'>"; // Enlace a la página de detalles del producto
                                        $contenido .= "<img src='" . RUTA_APP . $producto->getImagen() . "' alt='Imagen del producto' id='imgCompras'>";
                                        $contenido .= "</a>";
                                    $contenido .= "</div>";
                                    $contenido .= "<div class ='detalles'>";
                                        $contenido .= "<a class='subr' href='detalles_producto.php?id=" . $producto->getID() . "'>";
                                        $contenido .= "<h3>" . $producto->getNombre() ."</h3>";
                                        $contenido .= "</a>";//Solo la imagen y el nombre son clickeables
                                        $contenido .= "<p>" . $producto->getPrecio() . " €</p>";
                                    $contenido .= "</div>";
                                $contenido .= "</div>"; //fin div producto
                            
                        }
                        $contenido .= "</div>"; //fin div productos
                        
                        
                    } else {
                        $contenido .= "<p>No se encontraron productos</p>";
                    }
                    $contenido .= "</div>";
                $contenido .= "</section>";
            $contenido .= "</article>";
            
    require_once RAIZ_APP . '/includes/template.php';
