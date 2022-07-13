<?php 

namespace Model;

class Contacto extends ActiveRecord {

    public $asunto;
    public $mensaje;
    public $email;

    public function __construct($args = [])
    {
        $this->asunto = $args['asunto'] ?? null;
        $this->mensaje = $args['mensaje'] ?? '';
        $this->correo = $args['correo'] ?? '';
    }

    public function validarContacto(){
        if(!$this->asunto){
            self::$alertas[] = "Se requiere ubicar el asunto";
        }
        if(!$this->mensaje){
            self::$alertas[] = "Se requiere mensaje";
        }
        if(!$this->correo){
            self::$alertas[] = "Se requiere email personal para contactarlo";
        }
        return self::$alertas;
    }
}
