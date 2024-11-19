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
                <div id='tienda'>
                    <h1>TIENDA</h1>
        EOS;
                    if (!empty($productos)) {
                        
                        $contenido .= "<div id='divproductos'>";
                        foreach ($productos as $producto) {
                            
                            $class = "producto";
                            $contenido .= "<div class='$class' style='position: relative;'>";
                                // Aquí movemos el <a> para envolver todo el producto
                                $contenido .= "<a class='subr' href='detalles_producto.php?id=" . $producto->getID() . "'>"; // Enlace a la página de detalles del producto
                                
                                    // Imagen del producto
                                    $contenido .= "<div class='imgProducto'>";
                                        $contenido .= "<img src='" . RUTA_IMG . '/db/' . $producto->getImagen() . "' alt='Imagen del producto' id='imgCompras'>";
                                    $contenido .= "</div>";
                                    
                                    // Detalles del producto (nombre y precio)
                                    $contenido .= "<div class='detalles'>";
                                        $contenido .= "<h3>" . $producto->getNombre() ."</h3>";
                                        $contenido .= "<p>" . $producto->getPrecio() . " €</p>";
                                    $contenido .= "</div>";

                                $contenido .= "</a>"; // Cierra el enlace que envuelve todo el producto
                            $contenido .= "</div>"; //fin div producto
                            
                        }
                        $contenido .= "</div>"; //fin div productos
                        
                        
                    } else {
                        $contenido .= "<p>No se encontraron productos.</p>";
                        $contenido .= "<p>Por favor, elige otros criterios de búsqueda.</p>";
                    }
                    $contenido .= "</div>";
                $contenido .= "</section>";
            $contenido .= "</article>";
            
    require_once RAIZ_APP . '/includes/template.php';
