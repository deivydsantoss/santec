<?php

class Client extends Model
{
    public function addClient($first_name, $last_name, $username, $email)
    {

        $sql = $this->db->prepare("INSERT INTO Client SET first_name = :first, last_name = :last,  username = :username, email_client = :email");
        $sql->bindValue(":first", $first_name);
        $sql->bindValue(":last", $last_name);
        $sql->bindValue(":username", $username);
        $sql->bindValue(":email", $email);

        $sql->execute();

        return $this->db->lastInsertId();
    }

    public function countClient()
    {
        $data = array();
        $sql = $this->db->prepare(
            "SELECT  COUNT(DISTINCT C.id_client) AS quantity, C.*
            FROM Client AS C
            INNER JOIN Orders AS O on O.id_client = C.id_client 
            WHERE O.purchase_date >= CURDATE()
                AND O.purchase_date < CURDATE() + INTERVAL 1 DAY"
        );
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function searchClient($username, $email)
    {

        $sql = $this->db->prepare(
            "SELECT 
                *
            FROM Client 
            WHERE
                username = :username AND
                email_client = :email "
        );

        $sql->bindValue(":username", $username);
        $sql->bindValue(":email", $email);
        $sql->execute();

        $data= [];
        if ($sql->rowCount() > 0) {
            $data = $sql->fetch(PDO::FETCH_ASSOC);
        }
        return $data;
    }
}
