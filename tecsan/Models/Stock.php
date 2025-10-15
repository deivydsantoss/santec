<?php

Class Stock extends Model{

    private $permissions;

    public function hasPermission($name)
    {
        if (in_array($name, $this->permissions)) {
            return true;
        } else {
            return false;
        }
    }
    

    public function addProduct($name_product, $description, $id_category,$quantity,$price){

		$sql = $this->db->prepare("INSERT INTO products SET name_product = :name, description = :description, id_category = :id_category, price = :price, quantity = :quantity, situation = '1'");
        $sql->bindValue(":name", $name_product);
		$sql->bindValue(":description", $description);
		$sql->bindValue(":id_category", $id_category);
        $sql->bindValue(":price", $price);
        $sql->bindValue(":quantity", $quantity);
		$sql->execute();

		return $this->db->lastInsertId();

    }

    public function editProduct($name_product, $description, $category,$quantity,$price,$id){
        
        $sql = $this->db->prepare("UPDATE permission_groups SET name_product = :name, description = :description, category = :category, price = :price, quantity WHERE id = :id");
        $sql->bindValue(":name", $name_product);
		$sql->bindValue(":description", $description);
		$sql->bindValue(":category", $category);
        $sql->bindValue(":price", $price);
        $sql->bindValue(":quantity", $quantity);
        $sql->bindValue(":id", $id);

        if ($sql->execute()) {
            return  true;
        } else {
            return false;
        }
    }


    public function deleteProduct($id_product){
        $sql = $this->db->prepare("UPDATE products SET situation = 0 WHERE id_product = :id_product");
		$sql->bindValue(":id_product", $id_product);
		$sql->execute();
    }

    public function getList(){
        $data = array();
		$sql = $this->db->prepare("SELECT name_product, description, price, quantity FROM products INNER JOIN category ON products.id_category = category.name_category WHERE situation = '1' ");
		$sql->execute();

		if($sql->rowCount()>0){
			$data = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $data;
    }
}