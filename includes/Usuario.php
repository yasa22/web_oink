<?php

//include RAIZ_APP . '/includes/vistas/helpers/carrito.php';

class Usuario
{

    public const ADMIN_ROLE = 1;

    public const USER_ROLE = 2;

    private $nombreUsuario;

    private $password;

    private $email;

    private function __construct($nombreUsuario, $password, $email)
    {
        $this->nombreUsuario = $nombreUsuario;
        $this->password = $password;
        $this->email = $email;
    }

    public static function login($nombreUsuario, $password)
    {
        $usuario = self::buscaUsuario($nombreUsuario);

        if ($usuario && $usuario->compruebaPassword($password)) {
            return $usuario;
        }
        return false;
    }

    public static function crea($nombreUsuario, $password, $nombre, $apellido, $email)
    {
        //esta mal
        /*
        $user = new Usuario($nombreUsuario, self::hashPassword($password), $nombre, $apellido, $email, "clinete", null);
        $_SESSION["usuario"] = $user;
        $user->añadeRol("cliente");
        return $user->guarda();
        */
    }

    public static function buscaUsuario($nombreUsuario)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = "SELECT * FROM usuario U WHERE U.User=:nombreUsuario";
        $stmt = $conn->prepare($query);
        $stmt->execute(['nombreUsuario' => $nombreUsuario]);
        $result = false;
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($fila) {
            $result = new Usuario($fila['User'], $fila['contrasena'], $fila['correo']);
            //$result->inicializarCarrito();
            $_SESSION['usuario'] = $result; //Se guarda la variable de tipo usuario
        }

        return $result;
    }

    public static function buscaPorId($idUsuario)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT * FROM usuario WHERE Idusuario=%d", $idUsuario);
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            $fila = $rs->fetch(PDO::FETCH_ASSOC);
            if ($fila) {
                $result = new Usuario($fila['User'], $fila['Pass'], $fila['Nombre'], $fila['Apellido'], $fila['Email'], $fila['Rol'], $fila['Idusuario']);
            }
        } else {
            error_log("Error BD ({$conn->errorCode()}): {$conn->errorInfo()}");
        }
        return $result;
    }


    private static function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    private static function cargaRoles($usuario)
    {
        $Roles = [];

        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf(
            "SELECT RU.Rol FROM RolesUsuario RU WHERE RU.usuario=%d",
            $usuario->id
        );
        $rs = $conn->query($query);
        if ($rs) {
            $Roles = $rs->fetchAll(PDO::FETCH_ASSOC);

            $usuario->Roles = [];
            foreach ($Roles as $Rol) {
                $usuario->Roles[] = $Rol['Rol'];
            }
            return $usuario;
        } else {
            error_log("Error BD ({$conn->errorCode()}): {$conn->errorInfo()}");
        }
        return false;
    }

    private static function borra($usuario)
    {
        return self::borraPorId($usuario->id);
    }

    private static function borraPorId($idUsuario)
    {
        if (!$idUsuario) {
            return false;
        }
        /* Los Roles se borran en cascada por la FK
         * $result = self::borraRoles($usuario) !== false;
         */
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf(
            "DELETE FROM Usuarios U WHERE U.id = %d",
            $idUsuario
        );
        if (!$conn->exec($query)) {
            error_log("Error BD ({$conn->errorCode()}): {$conn->errorInfo()}");
            return false;
        }
        return true;
    }

    public function obtenerProductosDelUsuario()
    {
        /*
        foreach ($this->pedidos as $pedido) {
            foreach ($pedido->getProductos() as $producto) {
                echo "Nombre del producto: " . $producto->getNombre() . "\n";
                echo "Estado del pedido: " . $pedido->getEstado() . "\n";
                if ($pedido->getEstado() === 'entregado') {
                    echo "<button onclick='valorar(\"{$producto->getID()}\")'>Valorar</button>\n";
                }
                echo "------------------------\n";
            }
        }
        */
    }


    //Funcion para valorar el producto
    public static function valorarProducto($producto_id, $pedido_id, $usuario_id, $valoracion, $comentario)
    {
        $valoracionProducto = new Valoracion();
        $valoracionProducto->setValoracion($producto_id, $pedido_id, $usuario_id, $valoracion, $comentario);
    }

    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public static function getUsuario($id_usuario)
    {
        // Obtener la conexión a la base de datos
        $conn = Aplicacion::getInstance()->getConexionBd();

        // Preparar la consulta para obtener el nombre de usuario
        $query = "SELECT User FROM usuario WHERE Idusuario=:Idusuario";
        $stmt = $conn->prepare($query);

        // Ejecutar la consulta y devolver el nombre de usuario
        $stmt->execute(['Idusuario' => $id_usuario]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['User'];
    }


    public function compruebaPassword($password)
    {
        // Ahora sí podemos usar password_verify para comprobar las contraseñas hasheadas
        return password_verify($password, $this->password);
    }

    public function cambiaPassword($nuevoPassword)
    {
        $this->password = self::hashPassword($nuevoPassword);
    }

    public static function insertaUsuario($User, $correo, $contrasena)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $stmt = $conn->prepare('INSERT INTO usuario (User, contrasena, correo) VALUES (:User, :contrasena, :correo)');
        $stmt->execute([
            'User' => $User,
            'contrasena' => $contrasena,
            'correo' => $correo
        ]);
    }


    public static function editarUsuario($viejouser, $Nombre, $Apellido, $Email, $User, $Pass, $Rol, $Puntos)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $stmt = $conn->prepare('UPDATE usuario SET Apellido = :Apellido, Nombre = :Nombre, User = :User, Pass = :Pass, Email = :Email, Rol = :Rol, Puntos = :Puntos WHERE Idusuario = ' . $viejouser);
        $stmt->execute([
            'Apellido' => $Apellido,
            'Nombre' => $Nombre,
            'User' => $User,
            'Pass' => password_hash($Pass, PASSWORD_DEFAULT), // Hasheamos la contraseña
            'Email' => $Email,
            'Rol' => $Rol,
            'Puntos' => $Puntos
        ]);
    }
}
