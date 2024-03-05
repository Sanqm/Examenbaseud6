<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

class ProveedorController extends \Com\Daw2\Core\BaseController {

    function mostrarTodos() {
        $data = [];
        $data['titulo'] = 'Todos los proveedores';
        $data['seccion'] = '/proveedores';

        $modelo = new \Com\Daw2\Models\ProveedorModel();
        $data['proveedores'] = $modelo->getAll();
        if(isset($_SESSION['mensaje_proveedor'])){
            $data['mensaje'] = $_SESSION['mensaje_proveedor'];
            unset($_SESSION['mensaje_proveedor']);
        }

        $this->view->showViews(array('templates/header.view.php', 'proveedores.view.php', 'templates/footer.view.php'), $data);
    }
    
    function mostrarAdd() {
        $data = [];
        $data['titulo'] = 'Nuevo proveedor';
        $data['seccion'] = '/proveedores/add';
        $this->view->showViews(array('templates/header.view.php', 'edit.proveedor.view.php', 'templates/footer.view.php'), $data);
    }

    function mostrarEdit($cif) {
        $data = [];
        $data['titulo'] = 'Proveedor ' . $cif;
        $modelo = new \Com\Daw2\Models\ProveedorModel();
        $data['proveedor'] = $modelo->loadProveedor($cif);
        $this->view->showViews(array('templates/header.view.php', 'edit.proveedor.view.php', 'templates/footer.view.php'), $data);
    }

    function delete(string $cif) {
        $modelo = new \Com\Daw2\Models\ProveedorModel();        
        try{
            if($modelo->delete($cif)){
                $_SESSION['mensaje_proveedor'] = array(
                    'class' => 'success',
                    'texto' => "Proveedor $cif eliminado con éxito");
            }
            else{
                $_SESSION['mensaje_proveedor'] = array(
                    'class' => 'danger',
                    'texto' => 'No se ha logrado eliminar el proveedor '.$codigo);
            }
        }
        catch(\PDOException $ex){
            if(strpos($ex->getMessage(), '1451') !== false){
                $_SESSION['mensaje_proveedor'] = array(
                    'class' => 'warning',
                    'texto' => '<p>No se ha logrado eliminar el proveedor '.$codigo.'</p> <p>Elimine todos los productos del proveedor antes de realizar el borrado.</p>');
            }
            else{
                $_SESSION['mensaje_proveedor'] = array(
                    'class' => 'danger',
                    'texto' => 'Error 500. No se ha logrado eliminar el proveedor '.$codigo.'');
            }
        }
        finally{
            header('location: /proveedores');
        }
    }

    function cant_delete(string $cif) {
        $data = [];
        $data['titulo'] = 'No se ha podido borrar el proveedor con cif ' . $cif . ' debido a que tiene productos asociados.';
        $data['seccion'] = '/proveedores';
        $modelo = new \Com\Daw2\Models\ProveedorModel();
        $data['proveedor'] = $modelo->loadProveedor($cif);

        $this->view->showViews(array('templates/header.view.php', 'detail.proveedor.view.php', 'templates/footer.view.php'), $data);
    }

    function view(string $cif) {
        $data = [];
        $data['titulo'] = 'Consultando proveedor ' . $cif;
        $data['readonly'] = true;
        $modelo = new \Com\Daw2\Models\ProveedorModel();
        $data['proveedor'] = $modelo->loadProveedor($cif);

        $this->view->showViews(array('templates/header.view.php', 'edit.proveedor.view.php', 'templates/footer.view.php'), $data);
    }

    function add(): void {
        $data = [];
        $data['titulo'] = 'Nuevo Proveedor';
        $data['seccion'] = '/proveedores/add';
        $data['errores'] = $this->checkFormAdd($_POST);
        if (count($data['errores']) === 0) {
            $modelo = new \Com\Daw2\Models\ProveedorModel();
            $result = $modelo->add($_POST);

            if ($result) {
                header('Location: /proveedores');
                die;
            } else{
                $data['errores']['cif'] = 'Error indeterminado al realizar la inserción';
            } 
        } 
        $data['proveedor'] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        $this->view->showViews(array('templates/header-datatable.view.php', 'edit.proveedor.view.php', 'templates/footer-datatable.view.php'), $data);        
    }
    
    function edit(string $cif): void {
        $data = [];
        $data['titulo'] = 'Proveedor con cif ' . $cif;
        $data['seccion'] = '/proveedor/edit/' . $cif;
        $data['errores'] = $this->checkFormAdd($_POST, $cif);
        if (count($data['errores']) === 0) {
            $modelo = new \Com\Daw2\Models\ProveedorModel();
            $result = $modelo->edit($cif, $_POST);          
            if ($result) {
                header('Location: /proveedores');
                die;
            } else {
                 $data['errores']['cif'] = 'Error indeterminado al realizar la modificación';
            }
        }        
        $data['proveedor'] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        $this->view->showViews(array('templates/header-datatable.view.php', 'edit.proveedor.view.php', 'templates/footer-datatable.view.php'), $data);
    }
    
    /**
     * Comprueba que el formulario es válido
     * @param array $post Valores recibidos por post
     * @return array Array de errores
     */
    function checkFormAdd(array $post, string $cif = ''): array {
        $errores = [];
        if (empty($post['cif'])) {
            $errores['cif'] = "Campo obligatorio";
        } else if (!preg_match("/[a-zA-Z][0-9]{7}[a-zA-Z]/", $post['cif'])) {
            $errores['cif'] = "El cif debe seguir el siguiente formato: A0000000A";
        }
        else{
            if(empty($cif) || $cif != $post['cif']){
                $modelo = new \Com\Daw2\Models\ProveedorModel();
                $row = $modelo->loadProveedor($post['cif']);
                if(!is_null($row)){
                    $errores['cif'] = 'El cif se encuentra en uso por otro proveedor';
                }
            }
        }

        if (empty($post['codigo'])) {
            $errores['codigo'] = "Campo obligatorio";
        }

        if (empty($post['nombre'])) {
            $errores['nombre'] = "Campo obligatorio";
        }

        if (empty($post['website'])) {
            $errores['website'] = "Campo obligatorio";
        }

        if (empty($post['email'])) {
            $errores['email'] = "Campo obligatorio";
        }

        if (empty($post['pais'])) {
            $errores['pais'] = "Campo obligatorio";
        }

        if (empty($post['direccion'])) {
            $errores['direccion'] = "Campo obligatorio";
        }

        if (!preg_match("/[0-9+]+/", $post['telefono'])) {
            $errores['telefono'] = "El telefono debe tener un formato válido";
        }
        return $errores;
    }

}
