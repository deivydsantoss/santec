<?php

Class Category extends Model{

    private $permissions;

    public function hasPermission($name)
    {
        if (in_array($name, $this->permissions)) {
            return true;
        } else {
            return false;
        }
    }

    public function getCategory(){
        $data = array();
		$sql = $this->db->prepare("SELECT * FROM category");
		$sql->execute();

		if($sql->rowCount()>0){
			$data = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $data;
    }
}