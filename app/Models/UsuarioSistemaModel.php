<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace Com\Daw2\Models;

/**
 * Description of UsuarioSistemaModel
 *
 * @author Sandra Queimadelos 
 */
class UsuarioSistemaModel  extends \Com\Daw2\Core\BaseDbModel{
 
    const SELECT_FROM = "select us.*,ar.nombre_rol from usuario_sistema us left join aux_rol ar on ar.id_rol = us.id_rol";
    function getAll():array{
        $query= self::SELECT_FROM;
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll();
    }
    
    function getByDni(string $dni){
        $query = self::SELECT_FROM . " where us.dni=?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$dni]);
        if($row= $stmt->fetch()){
            return  $row;
        }else{
            return null;
        }
        }
       function lastAccess( string $dni):bool{
           $query = "update usuario_sistema set ultimo_acceso=NOW() where dni=?";
           $stmt =$this->pdo->prepare($query);
  
           if($stmt->execute([$dni])&& $stmt->rowCount()<=1){
               return true;
           }else{
               return false;
           }
       }
    
}
