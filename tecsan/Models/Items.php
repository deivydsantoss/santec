<?php

Class Items extends Model
{
    public function addItems($id_product, $id_order,$name_product, $total, $quantity )
    {

        $sql = $this->db->prepare("INSERT INTO Order_item SET  id_order = :id_order, name_products = :name, products_price_total = :price, quantity = :quantity, id_product = :id_product");

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
}