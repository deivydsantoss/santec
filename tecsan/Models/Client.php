<?php

class Client extends Model
{
        public function addClient($first_name,$last_name, $username, $email)
    {

        $sql = $this->db->prepare("INSERT INTO Client SET first_name = :first, last_name = :last,  username = :username, email_client = :email");
        $sql->bindValue(":first", $first_name);
        $sql->bindValue(":last", $last_name);
        $sql->bindValue(":username", $username);
        $sql->bindValue(":email", $email);

        $sql->execute();

        return $this->db->lastInsertId();
    }
}