<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace Com\Daw2\Models;

/**
 * Description of AuxLogModel
 *
 * @author Sandra Queimadelos 
 */
class AuxLogModel extends \Com\Daw2\Core\BaseDbModel{
    
    function updateLog(array $data):bool{
        $query = "insert into log (operacion, tabla, detalle,fecha) values (:operacion, :tabla,:detalle,NOW())";
        $stmt = $this->pdo->prepare($query);
        if($stmt->execute($data) && $stmt->rowCount()===1){
            return true;
        }else{
            return false;
        }             
    }
    
}
