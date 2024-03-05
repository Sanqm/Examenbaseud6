<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace Com\Daw2\Models;

/**
 * Description of AuxCategoriasModel
 *
 * @author Sandra Queimadelos 
 */
class AuxCategoriasModel  extends \Com\Daw2\Core\BaseDbModel{
    
    function getCategorias(int $id_rol):?array{
        $query = "select * from aux_rol ar where id_rol =?";
        $stmt= $this->pdo->prepare($query);
        $stmt->execute([$id_rol]);
        if($row = $stmt->fetch()){
            return $row;
        }else{
            return null;
        }
    }
    
}
