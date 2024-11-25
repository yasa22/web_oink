<?php
require_once dirname(__DIR__) . '/includes/config.php';
require_once RAIZ_APP . "/includes/producto.php";
require_once RAIZ_APP . '/includes/Usuario.php';
require_once RAIZ_APP . '/includes/Valoracion.php';
require_once RAIZ_APP . '/includes/Img_producto.php';

$producto_id = $_GET['id'];
$producto = Producto::getProducto($producto_id);

$titulo = "Tienda Oink!";
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
for ($i = 1; $i <= 6; $i++) {
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
<!-- Script JavaScript -->
<script>
  // Selección de elementos
  const carouselContainer = document.querySelector('.carousel-container');
  const carouselImages = document.querySelector('.carousel-images');
  const carouselButtons = document.querySelectorAll('.carousel-button');
  let index = 0;
  const images = document.querySelectorAll('.carousel-image');
  const totalImages = images.length;

  let autoSlide; // Variable para almacenar el intervalo

  // Función para mostrar la imagen actual
  function showImage(newIndex) {
    index = (newIndex + totalImages) % totalImages; // Asegura que el índice esté en rango
    carouselImages.style.transform = `translateX(-${index * 100}%)`;
  }

  // Función para avanzar al siguiente slide
  function moveToNextImage() {
    showImage(index + 1);
  }

  // Función para retroceder al slide anterior
  function moveToPrevImage() {
    showImage(index - 1);
  }

  // Función para reiniciar el avance automático
  function restartAutoSlide() {
    clearInterval(autoSlide); // Limpia el intervalo existente
    autoSlide = setInterval(moveToNextImage, 2000); // Crea un nuevo intervalo
  }

  // Event listeners para los botones
  document.querySelector('.carousel-button.next').addEventListener('click', () => {
    moveToNextImage();
    restartAutoSlide(); // Reinicia el temporizador tras el clic
  });
  
  document.querySelector('.carousel-button.prev').addEventListener('click', () => {
    moveToPrevImage();
    restartAutoSlide(); // Reinicia el temporizador tras el clic
  });

  // Inicializa el avance automático
  autoSlide = setInterval(moveToNextImage, 2000);

  // Pausar al pasar el mouse sobre el carrusel
  carouselContainer.addEventListener('mouseenter', () => clearInterval(autoSlide));
  carouselContainer.addEventListener('mouseleave', restartAutoSlide);
</script>

