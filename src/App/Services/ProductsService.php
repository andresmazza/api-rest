<?php

namespace App\Services;

class ProductsService extends BaseService
{

    public function find()
    {   
       return $this->db->fetchAll("SELECT * FROM product");
    }

    public function findById($id) {
       $sql = "SELECT * FROM product WHERE id = ?";
       return $this->db->fetchAssoc($sql, array((int) $id));       
    }

    function save($product)
    {  
        $this->db->insert("product",  $product);
        return $this->db->lastInsertId();
    }

    function update($id, $product)
    {
        return $this->db->update('product', $product, ['id' => $id]);
    }

    function delete($id)
    {
        return $this->db->delete("product", array("id" => $id));
    }

}
