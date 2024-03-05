<?php

declare(strict_types=1);

namespace Com\Daw2\Models;

class ProveedorModel extends \Com\Daw2\Core\BaseDbModel {

    function getAll(): array {
        $stmt = $this->pdo->query('SELECT * FROM proveedor ORDER BY cif, nombre');
        return $stmt->fetchAll();
    }
    
    function size() : int {
        $stmt = $this->pdo->query('SELECT * FROM proveedor');
        return count($stmt->fetchAll());
    }

    function delete(string $cif): int {
        $stmt = $this->pdo->prepare('DELETE FROM proveedor WHERE cif=?');
        $stmt->execute([$cif]);
        return $stmt->rowCount() == 1;
    }

    function add(array $data): bool {
        $size = count($this->getAll());
        $this->pdo->beginTransaction();
        $stmt = $this->pdo->prepare('INSERT INTO proveedor(cif,codigo,nombre,direccion,website,pais,email,telefono) values (?,?,?,?,?,?,?,?)');
        $stmt->execute([
            $_POST['cif'], $_POST['codigo'], $_POST['nombre'], $_POST['direccion'], $_POST['website'], $_POST['pais'], $_POST['email'], $_POST['telefono']]
        );
        $new_size = count($this->getAll());

        if (($size + 1) == $new_size) {
            $stmtLog = $this->pdo->prepare('INSERT INTO log (operacion,tabla,detalle) VALUES (?,?,?)');
            $stmtLog->execute([
                'insert', 'proveedor', 'Añadido un nuevo elemento a la tabla de proveedores con los datos: ' . print_r($data, true)                
            ]);
            $this->pdo->commit();
            return true;
        } else {
            return false;
        }        
    }

    function loadProveedor(string $cif): ?array {
        $stmt = $this->pdo->prepare('SELECT * FROM proveedor WHERE cif=?');
        $stmt->execute([$cif]);
        if($row = $stmt->fetch()){
           return $row;
        }   
        else{
            return null;
        }
    }

    function edit(string $cif, array $data): bool {        
        $this->pdo->beginTransaction();
        $stmt = $this->pdo->prepare('UPDATE proveedor SET cif=?, codigo=?, nombre=?, direccion=?, website=?, pais=?, email=?, telefono=? WHERE cif=?');
        $stmt->execute([$data['cif'], $data['codigo'], $data['nombre'], $data['direccion'], $data['website'], $data['pais'], $data['email'], $data['telefono'], $cif]);
        $stmtLog = $this->pdo->prepare('INSERT INTO log (operacion,tabla,detalle) VALUES (?,?,?)');
        $stmtLog->execute([
            'update', 'proveedor', 'Editado el proveedor con cif=' . $cif . ' a los siguientes valores: '. print_r($data, true)
        ]);
        $this->pdo->commit();
        return true;    
    }

}
