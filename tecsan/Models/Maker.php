<?php

Class Maker extends Model{

    private $permissions;

    public function hasPermission($name)
    {
        if (in_array($name, $this->permissions)) {
            return true;
        } else {
            return false;
        }
    }

    public function addMaker($name_maker){
        $sql = $this->db->prepare("INSERT INTO makers SET  name_maker = :name_maker, situation = '1'");
		$sql->bindValue(":name_maker", $name_maker);
		$sql->execute();

		return $this->db->lastInsertId();
    }

    public function getMaker(){
        $data = array();
		$sql = $this->db->prepare("SELECT * FROM makers");
		$sql->execute();

		if($sql->rowCount()>0){
			$data = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $data;
    }
}