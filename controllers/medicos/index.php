<?php
// require '../../models/Producto.php';
require '../../models/medico.php';
header('Content-Type: application/json; charset=UTF-8');

// echo json_encode($_GET);
// exit;
$metodo = $_SERVER['REQUEST_METHOD'];
// echo json_encode($_GET);
// exit;
try {
    switch ($metodo) {
        case 'POST':
            $tipo = $_REQUEST['tipo'];
            $medico = new medico($_POST);
            switch ($tipo) {
                case '1':
                    $ejecucion = $medico->guardar();
                    $mensaje = "Guardado correctamente";
                    break;

                case '2':
                    $ejecucion = $medico->modificar();
                    $mensaje = "Modificado correctamente";
                    break;

                    case '3':
                        $ejecucion = $medico->eliminar();
                        $mensaje = "Eliminado correctamente";
                        break;
                    

                default:
                    break;
            }
            http_response_code(200);
            echo json_encode([
                "mensaje" => $mensaje,
                "codigo" => 1,
            ]);
            break;
        case 'GET':

            http_response_code(200);
            $medico = new medico($_GET);
            $medicos = $medico->buscar();
            echo json_encode($medicos);
            break;

        default:
            http_response_code(405);
            echo json_encode([
                "mensaje" => "Método no permitido",
                "codigo" => 9,
            ]);
            break;
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        "detalle" => $e->getMessage(),
        "mensaje" => "Error de ejecución",
        "codigo" => 0,
    ]);
}

exit;
