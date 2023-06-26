<?php

namespace Api;

include '../vendor/autoload.php';
include '../src/headers.php';

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $err = [];
        $data = null;
        try {
            $data = json_decode(file_get_contents('php://input'));
            $args = json_decode(file_get_contents('php://input'), true);

            if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
                echo json_encode(['mensagem' => 'Payload incorreto']);
                die();
            }

            if (sizeof($args) != 3) {
                echo json_encode(['message' => 'Número de argumentos inválidos (esperados três)']);
                die();
            }

            # verify if fields exist
            (!isset($data->variavel) ? array_push($err, 1) : null);
            (!isset($data->lambda) ? array_push($err, 1) : null);
            (!isset($data->mi) ? array_push($err, 1) : null);

            if (sizeof($err) > 0) {
                echo json_encode(['message' => 'Payload incorreto']);
                die();
            }
        } catch (\Exception $ex) {
            echo json_encode(['message' => 'Requisição inválida']);
        }

        try {
            # Load solver class
            try {
                $queue = new Solver(strip_tags($data->lambda), strip_tags($data->mi));
                switch ($data->variavel) {

                    case 'TempoMedioEntreChegadas':
                        echo json_encode($queue->getTempoMedioEntreChegadas(), true);
                        break;

                    case 'TempoMedioAtendimento':
                        echo json_encode($queue->getTempoMedioAtendimento(), true);
                        break;

                    case 'TempoProvavelFila':
                        echo json_encode($queue->getTempoProvavelFila(), true);
                        break;

                    case 'TempoProvavelSistema':
                        echo json_encode($queue->getTempoProvavelSistema(), true);
                        break;

                    case 'ProbabilidadeFilaVazia':
                        echo json_encode($queue->getProbabilidadeFilaVazia(), true);
                        break;

                    case 'ProbabilidadeSistemaVazio':
                        echo json_encode($queue->getProbabilidadeSistemaVazio(), true);
                        break;

                    case 'OcupacaoSistema':
                        echo json_encode($queue->getOcupacaoSistema(), true);
                        break;

                    case 'NumeroProvavelSistema':
                        echo json_encode($queue->getNumeroProvavelSistema(), true);
                        break;

                    case 'NumeroProvavelFila':
                        echo json_encode($queue->getNumeroProvavelFila(), true);
                        break;

                    default:
                        echo json_encode(
                            [
                                $queue->getTempoMedioEntreChegadas(),
                                $queue->getTempoMedioAtendimento(),
                                $queue->getTempoProvavelSistema(),
                                $queue->getTempoProvavelFila(),
                                $queue->getProbabilidadeSistemaVazio(),
                                $queue->getProbabilidadeFilaVazia(),
                                $queue->getOcupacaoSistema(),
                                $queue->getNumeroProvavelSistema(),
                                $queue->getNumeroProvavelFila(),
                            ], true);
                        break;
                }
            } catch (\Exception $ex) {
                echo json_encode(['message' => $ex->getMessage()]);
                die();
            }

        } catch (\Exception $ex) {
            echo json_encode(['message' => $ex->getMessage()]);
            die();
        }

    } else {
        echo json_encode(['message' => 'Método não permitido']);
        die();
    }

} catch (\Exception $ex) {
    echo json_encode(['message' => $ex->getMessage()]);
    die();
}
