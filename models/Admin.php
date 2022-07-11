<?php

namespace Model;

class Admin extends ActiveRecord {
   
    // Base DE DATOS
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;
    public $valor;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validar() {
        if(!$this->email) {
            self::$alertas[] = "El Email del usuario es obligatorio";
        }
        if(!$this->password) {
            self::$alertas[] = "El Password del usuario es obligatorio";
        }
        return self::$alertas;
    }

    public function existeUsuario() {
        // Revisar si el usuario existe.
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
        $resultado = self::$db->query($query);

        if(!$resultado->num_rows) {
            self::$alertas[] = 'El Usuario No Existe';
            return;
        }

        return $resultado;
    }

    public function comprobarPassword($resultado) {
        $usuario = $resultado->fetch_object();

        $query = "SELECT * FROM " . self::$tabla . " WHERE password = '" . $this->password . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if($resultado->num_rows){
            $this->valor = true;
        }

        $this->autenticado = $this->valor;

        if(!$this->autenticado) {
            self::$alertas[] = 'El Password es Incorrecto';
            return;
        }
    }

    public function autenticar() {
         // El usuario esta autenticado
         session_start();

         // Llenar el arreglo de la sesión
         $_SESSION['usuario'] = $this->email;
         $_SESSION['login'] = true;

         header('Location: /admin');
    }

}
