<?php
require_once dirname(__DIR__) . '/includes/config.php';
require_once RAIZ_APP . "/includes/producto.php";
require_once RAIZ_APP . '/includes/Usuario.php';
require_once RAIZ_APP . '/includes/Valoracion.php';
require_once RAIZ_APP . '/includes/Img_producto.php';

$producto_id = $_GET['id'];
$producto = Producto::getProducto($producto_id);

$titulo  = "Detalles del producto";
$ruta = RUTA_IMG . '/db/' . $producto->getImagen();
$nombre = $producto->getNombre();
$descripcion = $producto->getDescripcion();

$imgProducto = new Img_producto(); // Create an instance of the class
$resultado = $imgProducto->getAllImg($producto_id);

$contenido = <<<EOS
<article>
    <section>
        <div id='detalles_producto'>
            <div id='producto'>
                <div id="imagen_producto">
                    <!-- Carrusel de imágenes -->
                    <div class="carousel-container">
                        <div class="carousel-images">
EOS;

// Agregar imágenes al carrusel
for ($i = 1; $i <= 3; $i++) {
    if (!empty($resultado["img$i"])) {
        $imgSrc = RUTA_IMG . '/db/' . $resultado["img$i"];
        $contenido .= "<img src='$imgSrc' class='carousel-image' alt='Imagen del producto $i'>";
    }
}

$contenido .= <<<EOS
                        </div>
                        <!-- Botones de navegación -->
                        <button class="carousel-button prev" onclick="moveCarousel(-1)">&#10094;</button>
                        <button class="carousel-button next" onclick="moveCarousel(1)">&#10095;</button>
                    </div>
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
$valoracion = null; // Sustituir con lógica para obtener valoraciones

if ($valoracion != null) {
    $usuario = Usuario::buscaPorId($valoracion["Idusuario"]);
    $usuarioNombre = $usuario->getNombre();
    $contenido .= "<div class='valoracion'>";
    $contenido .= "<p><strong>Usuario:</strong> $usuarioNombre</p>";
    $contenido .= "<p><strong>Valoración:</strong> {$valoracion["Valoracion"]}</p>";
    $contenido .= "<p><strong>Comentario:</strong> {$valoracion["Comentario"]}</p>";
    $contenido .= "</div>";
} else {
    $contenido .= "<p>No hay valoraciones en este producto</p>";
}

$contenido .= <<<EOS
            </div>
        </div>
    </section>
</article>
EOS;

require_once RAIZ_APP . '/includes/template.php';
?>

<!-- Script JavaScript -->
<script>
let currentIndex = 0;

function moveCarousel(direction) {
    const images = document.querySelector('.carousel-images');
    const totalImages = images.children.length;
    currentIndex += direction;

    // Ciclar el índice si está fuera de rango
    if (currentIndex < 0) {
        currentIndex = totalImages - 1;
    } else if (currentIndex >= totalImages) {
        currentIndex = 0;
    }

    // Mover el carrusel
    const offset = currentIndex * -100; // Desplazamiento en porcentaje
    images.style.transform = `translateX(${offset}%)`;
}
</script>
