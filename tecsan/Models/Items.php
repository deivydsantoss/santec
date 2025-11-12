<?php

Class Items extends Model
{
    public function addItems($name_product, $description, $id_category, $quantity, $price, $id_maker, $path)
    {

        $sql = $this->db->prepare("INSERT INTO stock SET name_product = :name, description = :description, id_maker = :id_maker, id_category = :id_category, price = :price, quantity = :quantity, path = :path , situation = '1'");
        $sql->bindValue(":name", $name_product);
        $sql->bindValue(":id_maker", $id_maker);
        $sql->bindValue(":description", $description);
        $sql->bindValue(":id_category", $id_category);
        $sql->bindValue(":price", $price);
        $sql->bindValue(":quantity", $quantity);
        $sql->bindValue(":path", $path);

        $sql->execute();

        return $this->db->lastInsertId();
    }
}