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
}