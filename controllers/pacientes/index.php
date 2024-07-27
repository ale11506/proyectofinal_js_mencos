<?php
// require '../../models/Producto.php';
require '../../models/paciente.php';
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
            $paciente = new paciente($_POST);
            switch ($tipo) {
                case '1':
                    $ejecucion = $paciente->guardar();
                    $mensaje = "Guardado correctamente";
                    break;

                case '2':
                    $ejecucion = $paciente->modificar();
                    $mensaje = "Modificado correctamente";
                    break;

                    case '3':
                        $ejecucion = $paciente->eliminar();
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
            $paciente = new paciente($_GET);
            $pacientes = $paciente->buscar();
            echo json_encode($pacientes);
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
