<?php

class Address extends Model
{
        public function addAddress($road,$complement)
    {

        $sql = $this->db->prepare("INSERT INTO Address SET first_name = :first, road = :road, complement = :complemento");
        $sql->bindValue(":road", $road);
        $sql->bindValue(":complement", $complement);


        $sql->execute();

        return $this->db->lastInsertId();
    }
}