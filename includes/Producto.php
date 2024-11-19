<?php
class Producto
{
    private $ID;
    private $Nombre;
    private $Descripcion;
    private $Precio;
    private $Imagen;

    public function __construct($ID, $Nombre, $Descripcion, $Precio, $Imagen)
    {
        $this->ID = $ID;
        $this->Nombre = $Nombre;
        $this->Descripcion = $Descripcion;
        $this->Precio = $Precio;
        $this->Imagen = $Imagen;
    }

    public static function getProducto($ID)
    {
        $pdo = aplicacion::getInstance()->getConexionBd();
        $stmt = $pdo->prepare('SELECT * FROM productos WHERE ID_Producto = :ID');
        $stmt->execute(['ID' => $ID]);
        $producto = $stmt->fetch();
    
        return new Producto(
            $producto['ID_Producto'],
            $producto['Nombre'],
            $producto['Descripcion'],
            $producto['Precio'],
            $producto['Imagen']
        );
    }

    public function getProductosReacondicionados() {
        // Obtener la instancia de la conexión a la base de datos
        $pdo = aplicacion::getInstance()->getConexionBd();

        // Preparar la consulta SQL para seleccionar solo los productos reacondicionados
        $stmt = $pdo->prepare('SELECT * FROM productos WHERE ID_Venta != 0');

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener todos los resultados como un array asociativo
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Verificar si se obtuvieron resultados
        if ($result === false) {
            // Si no hay resultados, mostrar un mensaje de error
            die('Error al obtener los productos reacondicionados de la base de datos');
        }

        // Devolver el resultado
        return $result;
    }

    public function getAllProductos()
    {
        // Obtener la instancia de la conexión a la base de datos
        $pdo = aplicacion::getInstance()->getConexionBd();

        // Preparar la consulta SQL para seleccionar todos los Productos
        $stmt = $pdo->prepare('SELECT * FROM productos');

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener todos los resultados como un array asociativo
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Verificar si se obtuvieron resultados
        if ($result === false) {
            // Si no hay resultados, mostrar un mensaje de error
            die('Error al obtener los productos de la base de datos');
        }

        // Devolver el resultado
        return $result;
    }

    public function createProducto($Nombre, $Descripcion, $Precio, $Imagen)
    {
        $pdo = aplicacion::getInstance()->getConexionBd();
        $stmt = $pdo->prepare('INSERT INTO productos (Nombre, Descripcion, Precio, Imagen) VALUES (:Nombre, :Descripcion, :Precio, :Imagen)');
        $stmt->execute([
            'Nombre' => $Nombre,
            'Descripcion' => $Descripcion,
            'Precio' => $Precio,
            'Imagen' => $Imagen
        ]);

        $this->ID = $pdo->lastInsertId();
        $this->Nombre = $Nombre;
        $this->Descripcion = $Descripcion;
        $this->Precio = $Precio;
        $this->Imagen = $Imagen;
    }
    public function getNombre()
    {
        return $this->Nombre;
    }

    public function getID()
    {
        return $this->ID;
    }

    public function getImagen()
    {
        return $this->Imagen;
    }

    public function getPrecio()
    {
        return $this->Precio;
    }

    public function getDescripcion()
    {
        return $this->Descripcion;
    }

}