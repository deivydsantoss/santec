<?php

Class Address extends Model
{
        public function addAddress($road, $complement, $last_id_client)
    {
        $sql = $this->db->prepare("INSERT INTO Address SET road = :road, complement = :complement, id_client = :last_id");
        $sql->bindValue(":road", $road);
        $sql->bindValue(":complement", $complement);
        $sql->bindValue(":last_id", $last_id_client);

        $sql->execute();

        return $this->db->lastInsertId();
    }
}
