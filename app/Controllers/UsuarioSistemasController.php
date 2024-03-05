<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
declare(strict_types=1);

namespace Com\Daw2\Controllers;

/**
 * Description of UsuarioSistemasController
 *
 * @author Sandra Queimadelos 
 */
class UsuarioSistemasController extends \Com\Daw2\Core\BaseController {

    function mostrarTodos() {
        $data = [];
        $data['titulo'] = 'Usuarios Sistema';
        $data['seccion'] = '/usuarios-sistema';

        $modelo = new \Com\Daw2\Models\UsuarioSistemaModel();
        $data['usuarios'] = $modelo->getAll();

        $this->view->showViews(array('templates/header.view.php', 'usuariosSistema.view.php', 'templates/footer.view.php'), $data);
    }

    function Login() {
        $this->view->show('login.view.php');
    }

    private function checkLogin(array $data): array {
        $errores = [];
        if (empty($data['dni']) || empty($data['pass'])) {
            $errores['login'] = "No puede haber campos vacios";
        }
        return $errores;
    }

    function processLogin() {
        $errores = $this->checkLogin($_POST);
        if (count($errores) == 0) {
            $model = new \Com\Daw2\Models\UsuarioSistemaModel();
            $usuario = $model->getByDni($_POST['dni']);
            if (!is_null($usuario) && $usuario['baja'] == 0) {
                if (password_verify($_POST['pass'], $usuario['contrasinal'])) {
                    unset($usuario['contrasinal']);
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['permisos'] = $this->processPermisos($usuario['id_rol']);
                    $model->lastAccess($usuario['dni']);
                    $lastlog = [
                        'operacion' => 'Login',
                        'tabla' => 'usuarios-sistema',
                        'detalle' => 'Usuario ' . $usuario['nombre_completo'] . 'accede al sistema',
                    ];
                    $modLog = new \Com\Daw2\Models\AuxLogModel();
                    $modLog->updateLog($lastlog);

                    header('location: /');
                } else {
                    $errores['login'] = "Datos de acceso incorrectos";
                }
            } else {
                $errores['login'] = "Datos incorrectos";
            }
        } else {
            $errores['login'] = "Usuario no existe";
        }
        $data = [
            'errores' => $errores,
            'dni' => filter_input(INPUT_POST, 'dni', FILTER_SANITIZE_SPECIAL_CHARS)
        ];

        $this->view->show('login.view.php', $data);
    }

    function logOut() {
        session_destroy();
        header('location: /login');
    }

    function processPermisos(int $id_rol): array {
        $model = new \Com\Daw2\Models\AuxCategoriasModel();
        $rol = $model->getCategorias($id_rol);
        $permisos = [
            'sistemas' => '',
            'categorias' => '',
            'proveedores' => '',
            'productos' => ''
        ];
        if($rol['nombre_rol']=="Administrador"){
            foreach ($permisos as $key => $value) {
                $permisos[$key] ='rwd';
            }
        }
        if($rol['nombre_rol']=="Auditor"){
             foreach ($permisos as $key => $value) {
                $permisos[$key] ='r';
            }
        }
        if($rol['nombre_rol']=="Limpiador"){
             foreach ($permisos as $key => $value) {
                $permisos[$key] ='rd';
            }
            $permisos['sistemas'] ='';
        }
        
        return $permisos;
    }

}
