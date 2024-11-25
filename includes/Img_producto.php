<?php
class Img_producto {
    private $ID;
    private $img1;
    private $img2;
    private $img3;
    private $pdo;

    public function __construct() {
        $this->pdo = Aplicacion::getInstance()->getConexionBd();
        $this->ID = 0;
        $this->img1 = 0;
        $this->img2 = 0;
        $this->img3 = 0;
    }

    public function getID() {
        return $this->ID;
    }

    public function getImg1() {
        return $this->img1;
    }

    public function getImg2() {
        return $this->img2;
    }

    public function getImg3() {
        return $this->img3;
    }

    public function getAllImg($producto_id) {
        try {
            $stmt = $this->pdo->prepare("SELECT img1, img2, img3, img4, img5, img6 FROM img_producto WHERE ID = :producto_id");
            $stmt->bindParam(':producto_id', $producto_id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? $result : [];
        } catch (PDOException $e) {
            // Handle error
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
}
?>