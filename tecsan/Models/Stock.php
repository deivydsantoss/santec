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
    

    public function addProduct(){
        
    }

    public function editProduct(){
        
    }

    public function deleteProduct(){
        
    }

    public function getList(){
        $data = array();
		$sql = $this->db->prepare("SELECT users.id, users.name, users.email, users.id_group, users.type, users.situation, permission_groups.name AS name_group FROM users INNER JOIN permission_groups ON permission_groups.id = users.id_group");
		$sql->execute();

		if($sql->rowCount()>0){
			$data = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $data;
    }
}