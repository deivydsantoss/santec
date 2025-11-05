<?php

class Stock extends Model
{

    private $permissions;

    public function hasPermission($name)
    {
        if (in_array($name, $this->permissions)) {
            return true;
        } else {
            return false;
        }
    }


    public function addProduct($name_product, $description, $id_category, $quantity, $price, $id_maker, $path)
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

    public function editProduct($name_product, $description, $quantity, $price, $id_category, $id_makers, $id_product)
    {

        $sql = $this->db->prepare("UPDATE stock SET name_product = :name_product, description = :description, id_maker = :id_makers, id_category = :id_category, price = :price, quantity = :quantity WHERE id_product = :id_product");
        $sql->bindValue(":name_product", $name_product);
        $sql->bindValue(":description", $description);
        $sql->bindValue(":price", $price);
        $sql->bindValue(":quantity", $quantity);
        $sql->bindValue(":id_category", $id_category);
        $sql->bindValue(":id_makers", $id_makers);
        $sql->bindValue(":id_product", $id_product);


        if ($sql->execute()) {
            return  true;
        } else {
            return false;
        }
    }

    public function restoreProduct($id_product)
    {
        $sql = $this->db->prepare("UPDATE stock SET situation = '1' WHERE id_product = :id_product");
        $sql->bindValue(":id_product", $id_product);
        $sql->execute();
    }

    public function MoveToTrashProduct($id_product)
    {
        $sql = $this->db->prepare("UPDATE stock SET situation = '0' WHERE id_product = :id_product");
        $sql->bindValue(":id_product", $id_product);
        $sql->execute();
    }

    public function RemoveToTrashProduct($id_product)
    {
        $sql = $this->db->prepare("UPDATE stock SET situation = '1' WHERE id_product = :id_product");
        $sql->bindValue(":id_product", $id_product);
        $sql->execute();
    }

    public function deleteProduct($delete)
    {
        $sql = $this->db->prepare("DELETE FROM stock WHERE id_product = :delete");
        $sql->bindValue(":delete", $delete);
        $sql->execute();
    }

    public function getList()
    {
        $data = array();
        $sql = $this->db->prepare(
            "SELECT
                P.id_product,
                P.id_category,
                P.id_maker,
                P.name_product,
                P.description,
                P.price,
                P.quantity,
                P.path,
                C.name_category,
                M.name_maker
            FROM stock AS P
            INNER JOIN category AS C
                ON C.id_category = P.id_category
            INNER JOIN makers AS M
                ON M.id_makers = P.id_maker
            WHERE P.situation = '1'"
        );
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function getListTrash()
    {
        $data = array();
        $sql = $this->db->prepare(
            "SELECT
                P.id_product,
                P.name_product,
                P.description,
                P.price,
                P.quantity,
                C.name_category,
                M.name_maker
            FROM stock AS P
            INNER JOIN category AS C
                ON C.id_category = P.id_category
            INNER JOIN makers AS M
                ON M.id_makers = P.id_maker
            WHERE P.situation = '0'"
        );
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function selectCategory($id_category)
    {
        $data = array();
        $sql = $this->db->prepare(
            "SELECT
                P.id_product,
                P.id_category,
                P.id_maker,
                P.name_product,
                P.description,
                P.price,
                P.quantity,
                P.path,
                C.name_category,
                M.name_maker
            FROM stock AS P
            INNER JOIN category AS C
                ON C.id_category = P.id_category
            INNER JOIN makers AS M
                ON M.id_makers = P.id_maker
            WHERE P.id_category = :category"
        );

        $sql->bindValue(":category", $id_category);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }
}
