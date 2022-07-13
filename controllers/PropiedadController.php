<?php 

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController  {
    
    public static function index(Router $router) {
        $propiedades = Propiedad::all();

        // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/index', [
            'propiedades' => $propiedades,
            'resultado' => $resultado
        ]);
    }

    public static function crear(Router $router) {

        $errores = Propiedad::getAlertas();
        $propiedad = new Propiedad;

        // Ejecutar el código después de que el usuario envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            /* Crea una nueva instancia */
            $propiedad = new Propiedad($_POST['propiedad']);
            $peso = $_FILES['propiedad']['size']['imagen'];

            /* debuguear($_FILES); */

            // Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

            // Setear la imagen
            // Realiza un resize a la imagen con intervention
            if($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);

                $propiedad->setImagen($nombreImagen);
            }

            // Validar
            $errores = $propiedad->validar($peso);
            if(empty($errores)) {

                // Crear la carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                // Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                // Guarda en la base de datos
                $resultado = $propiedad->guardar();

                if($resultado) {
                    header('location: /propiedades');
                }
            }
        }

        $router->render('propiedades/crear', [
            'errores' => $errores,
            'propiedad' => $propiedad,
        ]);
    }

    public static function actualizar(Router $router) {

        $id = validarORedireccionar('/propiedades');
        // Obtener los datos de la propiedad
        $propiedad = Propiedad::find($id);

        // Arreglo con mensajes de errores
        $errores = Propiedad::getAlertas();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

                // Asignar los atributos
                $args = $_POST['propiedad'];
                $peso = $_FILES['propiedad']['size']['imagen'];
                /* debuguear($_FILES); */

                $propiedad->sincronizar($args);
                // Validación
                $errores = $propiedad->validar($peso);

                // Subida de archivos
                // Generar un nombre único
                $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

                if($_FILES['propiedad']['tmp_name']['imagen']) {
                    $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                    $propiedad->setImagen($nombreImagen);
                }
                if(empty($errores)) {
                    // Almacenar la imagen
                    if($_FILES['propiedad']['tmp_name']['imagen']) {
                        $image->save(CARPETA_IMAGENES . $nombreImagen);
                    }

                    // Guarda en la base de datos
                    
                    $resultado = $propiedad->guardar();

                    if($resultado) {
                        header('location: /propiedades');
                    }
                }

        }

        $router->render('propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores
        ]);
    }

    public static function eliminar(Router $router) {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tipo = $_POST['tipo'];

            // peticiones validas
            if(validarTipoContenido($tipo) ) {
                // Leer el id
                $id = $_POST['id'];
                $id = filter_var($id, FILTER_VALIDATE_INT);
    
                // encontrar y eliminar la propiedad
                $propiedad = Propiedad::find($id);
                $resultado = $propiedad->eliminar();

                // Redireccionar
                if($resultado) {
                    header('location: /propiedades');
                }
            }
        }
    }

}