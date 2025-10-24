<?php

Class Orders extends Model{

    private $permissions;

    public function hasPermission($name){
        if (in_array($name, $this->permissions)) {
            return true;
        } else {
            return false;
        }
    }
        public function addOrder($date,$name_product,$id_maker,$quantity,$unit_price,$total_price){

		$sql = $this->db->prepare("INSERT INTO Orders SET id_product = :name, id_maker = :id_maker,quantity = :quantity, total_price = :total_price, unit_price = :unit_price, situation = '1'");
        $sql->bindValue(":date", $date);
        $sql->bindValue(":name", $name_product);
        $sql->bindValue(":id_maker", $id_maker);
        $sql->bindValue(":quantity", $quantity);
        $sql->bindValue(":total_price", $total_price);
        $sql->bindValue(":unit_price", $unit_price);
        
		$sql->execute();

		return $this->db->lastInsertId();

    }
    
    public function getOrders(){
        $data = array();
		$sql = $this->db->prepare(
            "SELECT
                O.id_order,
                O.delivery_date,
                O.delivery_time,
                O.purchase_date,
                O.total_price,
                O.unit_price,
                O.quantity,
                P.id_product,
                P.id_maker,
                P.name_product,
                M.name_maker
            FROM Orders AS O
            INNER JOIN stock AS P
                ON O.id_product = P.id_product
            INNER JOIN makers AS M
                ON M.id_makers = P.id_maker
            WHERE P.situation = '1'"
            );
		$sql->execute();

		if($sql->rowCount()>0){
			$data = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $data;
    }

}