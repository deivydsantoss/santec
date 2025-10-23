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
    
    public function getOrders(){
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

		if($sql->rowCount()>0){
			$data = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $data;
    }

}