<?php

namespace App\Services;

class ProductsListService extends BaseService
{

    public function find()
    {   
        return $this->db->fetchAll("SELECT id, name,GROUP_CONCAT(id_product) as products  FROM productsList GROUP BY name");
    }

    public function findByName($name) {
       $sql = "SELECT id_product  FROM productsList WHERE name = :name";
       return $this->db->fetchAll($sql, array($name));
    }
}
