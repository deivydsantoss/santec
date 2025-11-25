<?php

Class Config extends Model
{

    public function getMeta(){
        $data = array();
        $sql = $this->db->prepare(
            "SELECT renda_diaria ,renda_mensal ,qtd_pedidos , qtd_novo_user FROM Config ORDER BY id_config DESC LIMIT 1;"
        );
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

        public function addMeta($renda_diaria, $renda_mensal, $qtd_pedidos,$qtd_novo_user)
    {
        $sql = $this->db->prepare("INSERT INTO Config SET renda_diaria = :renda_diaria, renda_mensal = :renda_mensal, qtd_pedidos = :qtd_pedidos ,qtd_novo_user = :qtd_novo_user");
        $sql->bindValue(":renda_diaria", $renda_diaria);
        $sql->bindValue(":renda_mensal", $renda_mensal);
        $sql->bindValue(":qtd_pedidos", $qtd_pedidos);
        $sql->bindValue(":qtd_novo_user", $qtd_novo_user);

        $sql->execute();

        return $this->db->lastInsertId();
    }
}
