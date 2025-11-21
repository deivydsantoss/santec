<?php

class Items extends Model
{
    public function addItems($id_product, $id_order, $name_product, $total, $quantity)
    {

        $sql = $this->db->prepare("INSERT INTO Order_item SET  id_order = :id_order, name_products = :name, products_price_total = :price * :quantity , quantity = :quantity, id_product = :id_product");

        $sql->bindValue(":name", $name_product);
        $sql->bindValue(":id_order", $id_order);
        $sql->bindValue(":price", $total);
        $sql->bindValue(":quantity", $quantity);
        $sql->bindValue(":id_product", $id_product);

        $sql->execute();

        return $this->db->lastInsertId();
    }

    public function getListChart()
    {
        $data = array();
        $sql = $this->db->prepare("SELECT name_products, SUM(quantity) as quantity FROM Order_item  GROUP BY id_product");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function getListChartCateg()
    {
        $data = array();
        $sql = $this->db->prepare(
            "SELECT
                P.id_category,
                C.name_category,
                SUM(G.quantity) as quantity
            FROM Order_item AS G
            INNER JOIN stock AS P
                ON G.id_product = P.id_product
            INNER JOIN category AS C
                ON C.id_category = P.id_category
            GROUP BY P.id_category"
        );
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function getTodayRevenue()
    {
        $data = array();
        $sql = $this->db->prepare(
            "SELECT 
                SUM(G.products_price_total) as price
            FROM Order_item AS G
            INNER JOIN Orders AS O
                ON G.id_order = O.id_order
            WHERE O.purchase_date >= CURDATE()
                    AND O.purchase_date < CURDATE() + INTERVAL 1 DAY
            GROUP BY 
                DATE(O.purchase_date);");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function getTotalRevenue()
    {
        $data = array();
        $sql = $this->db->prepare(
            "SELECT 
                SUM(G.products_price_total) as total_price
            FROM Order_item AS G
            INNER JOIN Orders AS O
                ON G.id_order = O.id_order
            WHERE 
            MONTH(O.purchase_date) = MONTH(CURDATE())
                AND YEAR(O.purchase_date) = YEAR(CURDATE())
            GROUP BY 
                YEAR(O.purchase_date), 
                MONTH(O.purchase_date);");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch(PDO::FETCH_ASSOC);
        }
        return $data;
    }
}
