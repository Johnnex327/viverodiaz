<?php

namespace Model;

class Propiedad extends ActiveRecord {

    // Base DE DATOS
    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion'];


    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';

    }

    public function validar($peso = 0) {
        
        if(!$this->titulo) {
            self::$alertas[] = "Debes añadir un titulo";
        }

        if(!$this->precio) {
            self::$alertas[] = 'El Precio es Obligatorio';
        }
        $numeroPalabras = str_word_count($this->descripcion); 
        
        if($numeroPalabras >= 75 ) {
            
            self::$alertas[] = 'La descripción es obligatoria y debe tener solo 75 palabras';
        }
        if(!$this->id )  {
            $this->validarImagen();
        }

        
        $medida = 1000 * 1000;
        if($peso > 12000000){
            self::$alertas[] = 'La imagen pesa mas de 10Mb';
        } 
        return self::$alertas;
    }

    public function validarImagen() {
        if(!$this->imagen ) {
            self::$alertas[] = 'La Imagen es Obligatoria';
        }
    }

}